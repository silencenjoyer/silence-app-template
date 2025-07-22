<?php

use ShipMonk\ComposerDependencyAnalyser\Config\Configuration;

return (new Configuration())
    ->addPathsToScan(['app'], false)
    ->addPathRegexesToExclude(['/Tests/'])
;
