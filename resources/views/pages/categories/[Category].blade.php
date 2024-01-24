<?php

use function Laravel\Folio\name;

name('category.show');

?>

<div>
    <h1>Scheda categoria</h1>
    <p>Titolo: {{ $category->name }}</p>
</div>
