<?php

use atoum\atoum;

$report = $script->addDefaultReport();

$report->addField(new atoum\report\fields\runner\result\logo());

$runner->addTestsFromDirectory('tests/Units');
