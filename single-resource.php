<?php

use Timber\Timber;

$context = Timber::context();

Timber::render('templates/single-resource.twig', $context);
