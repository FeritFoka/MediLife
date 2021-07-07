<?php
$transport = new \Kendo\Data\DataSourceTransport();

$read = new \Kendo\Data\DataSourceTransportRead();

// Specify the url of the PHP page which will act as the remote service
$read->url('../src/components/requests/patients_insurance.php')
    ->contentType('application/json')
    ->type('POST');

$transport->read($read);

// Configure the model
$model = new \Kendo\Data\DataSourceSchemaModel();

$fieldType = new \Kendo\Data\DataSourceSchemaModelField('type');
$fieldType->type('string');

$fieldValue = new \Kendo\Data\DataSourceSchemaModelField('value');
$fieldValue->type('number');

$fieldTypes = new \Kendo\Data\DataSourceSchemaModelField('types');
$fieldTypes->type('string');

$fieldType = new \Kendo\Data\DataSourceSchemaModelField('values');
$fieldType->type('object');

$model->addField($fieldType, $fieldValue);
$model->addField($fieldTypes);

$schema = new \Kendo\Data\DataSourceSchema();
$schema->model($model);

$dataSource = new \Kendo\Data\DataSource();
$dataSource->transport($transport)
    ->schema($schema);

$chart = new \Kendo\Dataviz\UI\Chart('insurance_pie_chart');

$seriesBasic = new \Kendo\Dataviz\UI\ChartSeriesItem();
$seriesBasic->field('values');

$categoryAxis = new \Kendo\Dataviz\UI\ChartCategoryAxisItem();
$categoryAxis->field('types');

$chart
    ->addSeriesItem($seriesBasic)
    ->dataSource($dataSource)
    ->legend(array('position' => 'top'))
    ->tooltip(array(
        'visible' => true,
        'format' => 'N0',
        'template' => "#= category # - #= kendo.format('{0:P}', percentage)#"));

echo $chart->render();
