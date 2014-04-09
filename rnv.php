<?php
$rnvdata = file_get_contents("http://efa9-5.vrn.de/vrn/XSLT_DM_REQUEST?language=de&itdLPxx_dmlayout=gadget&itdLPxx_gadget=version_1.0.5&timeOffset=3&type_dm=any&mode=direct&limit=8&useRealtime=1&locationServerActive=1&anySigWhenPerfectNoOtherMatches=1&anyHitListReductionLimit=40&anyMaxSizeHitList=550&name_dm=6002359");
print $rnvdata;
?>
