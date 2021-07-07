<?php

$read = new \Kendo\Data\DataSourceTransportRead();
$read->url('./requests/doctors_institution_spec.php')
    ->contentType('application/json')
    ->type('POST');

$transport = new \Kendo\Data\DataSourceTransport();
$transport->read($read);

$model = new \Kendo\Data\DataSourceSchemaModel();

$nameField = new \Kendo\Data\DataSourceSchemaModelField('name');
$nameField->type('string');

$oibField = new \Kendo\Data\DataSourceSchemaModelField('OIB');
$oibField->type('number');

$surnameField = new \Kendo\Data\DataSourceSchemaModelField('surname');
$surnameField->type('string');

$specializationField = new \Kendo\Data\DataSourceSchemaModelField('specialization'); #???
$specializationField->type('string');

$institutionField = new \Kendo\Data\DataSourceSchemaModelField('institution'); #???
$institutionField->type('string');

$model
    ->addField($oibField)
    ->addField($nameField)
    ->addField($surnameField)
    ->addField($specializationField)
    ->addField($institutionField);

$schema = new \Kendo\Data\DataSourceSchema();
$schema->model($model);

$dataSource = new \Kendo\Data\DataSource();
$dataSource->transport($transport)
    ->schema($schema)
    ->pageSize(7)
    ->serverPaging(true);

$columnName = new \Kendo\UI\GridColumn();
$columnName->field('name')
    ->title('Name');

$columnSurname = new \Kendo\UI\GridColumn();
$columnSurname->field('surname')
    ->title('Surname');

$columnOib = new \Kendo\UI\GridColumn();
$columnOib->field('OIB')
    ->title('OIB');

$columnSpecialization = new \Kendo\UI\GridColumn();
$columnSpecialization->field('specialization')
    ->title('Specialization');

$columnInstitution = new \Kendo\UI\GridColumn();
$columnInstitution->field('institution')
    ->title('Institution');

$grid = new \Kendo\UI\Grid('grid');
$grid->addColumn($columnOib)
    ->addColumn($columnName)
    ->addColumn($columnSurname)
    ->addColumn($columnSpecialization)
    ->addColumn($columnInstitution)
    ->dataSource($dataSource)
    ->filterable(true)
    ->sortable(true)
    ->pageable(true)
    ->groupable(true);

echo $grid->render();
