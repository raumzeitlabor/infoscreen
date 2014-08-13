xively.setKey("M3JtslLtgs9iBo1YWcnk6LEmMBHmMrCZhsGWtb0jXdSCFwJA");
var temp_series = [];
var temp_min;
var temp_max;
function get_graphs() {
  var query_stromtemp = {
    start: moment().subtract("minutes", 120).toJSON(),
    end: moment().toJSON(),
    interval: 30,
    limit: 1000
  };

  var query_kontopayback = {
    start: moment().subtract("year", 1).toJSON(),
    end: moment().toJSON(),
    interval: 86400,
    limit: 1000
  };
  temp_min = Number.MAX_VALUE;
  temp_max = Number.MIN_VALUE;
  xively.datastream.history( "42055", "Temperatur_Raum_Beamerplattform", query_stromtemp, temp_innen_callback);
  xively.datastream.history( "42055", "Strom_Leistung", query_stromtemp, strom_callback);
  xively.datastream.history( "42055", "Payback_Punkte", query_kontopayback, payback_callback);
  xively.datastream.history( "42055", "Kontostand", query_kontopayback, konto_callback);
  xively.datastream.history( "42055", "Temperatur_aussen", query_stromtemp, temp_aussen_callback);
}

function strom_callback(data) {
  loadData(data, "strom", "Watt");
}
function temp_innen_callback(data) {
  loadData_float(data, "temp", "Innen", temp_series);
}
function temp_aussen_callback(data) {
  loadData_float(data, "temp", "Aussen", temp_series);
}
function payback_callback(data) {
  loadData(data, "payback", "Punkte");
}
function konto_callback(data) {
  loadData(data, "konto", "Euro");
}

function loadData(data, name, label) {
  if (data.status == 403){return;} //don't even try to process if xively API denied the request
  var data_points = [];
  var scale;
  var min = Number.MAX_VALUE;
  var max = Number.MIN_VALUE;
  for (var i=0; i < data.datapoints.length; i++ ) {
    var date = moment(data.datapoints[i].at);
    var value = parseInt(data.datapoints[i].value);
    data_points[i] = {x: date.unix(), y: value};
    min = Math.min(min, value);
    max = Math.max(max, value);
  }
  min -= 100;
  scale = d3.scale.linear().domain([min, max]).nice();
  var series = [{ data: data_points, color: '#00aa00', name: label, scale: scale}];
  drawGraph(series, scale, name);
}

function loadData_float(data, name, label, series) {
  if (data.status == 403){return;} //don't even try to process if xively API denied the request
  var data_points = [];
  var scale;
  for (var i=0; i < data.datapoints.length; i++ ) {
    var date = moment(data.datapoints[i].at);
    var value = parseFloat(data.datapoints[i].value);
    data_points[i] = {x: date.unix(), y: value};
    temp_min = Math.min(temp_min, value);
    temp_max = Math.max(temp_max, value);
  }
  temp_min -= 0.5;
  temp_max += 0.5;
  scale = d3.scale.linear().domain([temp_min, temp_max]).nice();
  if(label == "Innen"){
    series[0] = { data: data_points, color: '#aa0000', name: label, scale: scale};
  }
  if(label == "Aussen"){
    series[1] = { data: data_points, color: '#0000aa', name: label, scale: scale};
    series[0].scale = series[1].scale; //use the final calculated scale also for the inside temperature graph
    drawGraph(series, scale, name);
  }
}

function drawGraph(data, scale, name) {
  $("#"+name+"_y_axis > *").remove();
  $("#"+name+"_legend > *").remove();
  $("#"+name+"_chart > *:not(:nth-child(1))").remove();

  var graph = new Rickshaw.Graph({
    element: document.querySelector("#"+name+"_chart"),
    renderer: 'line',
    height: 200,
    series: data
  });

  var time;
  var timeunit;
  if(name == "strom" || name == "temp"){
    time = new Rickshaw.Fixtures.Time();
    timeunit = time.unit('15 minute');
    timeunit.seconds = 60 * 10;
    timeunit.formatter = function(d) {return d.toString().match(/(\d+:\d+):/)[1];};
  }
  if(name == "payback" || name == "konto"){
    time = new Rickshaw.Fixtures.Time();
    timeunit = time.unit('month');
  }

  var xAxis = new Rickshaw.Graph.Axis.Time({
      graph: graph,
      timeUnit: timeunit,
  });

  xAxis.render();

  var tickformat;
  if(name == "temp"){
    tickformat = function(y){return y.toFixed(2)};
  } else {
    tickformat = Rickshaw.Fixtures.Number.formatKMBT;
  }

  var y_axis = new Rickshaw.Graph.Axis.Y.Scaled({
     graph: graph,
     orientation: 'left',
     color: '#ffffff',
     scale: scale,
     tickFormat: tickformat,
     pixelsPerTick: 40,
     element: document.getElementById(name+'_y_axis'),
  });

 graph.render();
 var legend = new Rickshaw.Graph.Legend({
    graph: graph,
    element: document.getElementById(name+'_legend')
  });
}
