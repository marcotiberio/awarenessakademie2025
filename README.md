# Flynt

[![standard-readme compliant](https://img.shields.io/badge/readme%20style-standard-brightgreen.svg?style=flat-square)](https://github.com/RichardLitt/standard-readme)
[![Build Status](https://travis-ci.org/flyntwp/flynt.svg?branch=master)](https://travis-ci.org/flyntwp/flynt)
[![Code Quality](https://img.shields.io/scrutinizer/g/flyntwp/flynt.svg)](https://scrutinizer-ci.com/g/flyntwp/flynt/?branch=master)

## Short Description

[Flynt](https://flyntwp.com/) is a WordPress theme for component-based development using [Timber](#page-templates) and [Advanced Custom Fields](#advanced-custom-fields).

## Table of Contents

* [Install](#install)
  * [Dependencies](#dependencies)
* [Usage](#usage)
  * [Assets](#assets)
  * [Lib & Inc](#lib--inc)
  * [Page Templates](#page-templates)
  * [Components](#components)
  * [Advanced Custom Fields](#advanced-custom-fields)
  * [Field Groups](#field-groups)
  * [ACF Option Pages](#acf-option-pages)
  * [Timber Dynamic Resize](#timber-dynamic-resize)
  * [Twig Extensions](#twig-extensions)
* [Maintainers](#maintainers)
* [Contributing](#contributing)
* [License](#license)

## Install

1. Clone this repo to `<your-project>/wp-content/themes`.
2. Change the domain variable in `flynt/build-config.js` to match your domain: `const domain = 'your-project.test'`
3. Create a `.env` file in the theme folder.
4. Define ssl certificate variables to enable ssl support for the vite dev server:

```
VITE_DEV_SERVER_KEY=<path-to-ssl-certificate-key>/your-project.test_key.pem
VITE_DEV_SERVER_CERT=<path-to-ssl-certificate-cert>/your-project.test_cert.pem
```

5. Navigate to the theme folder and run the following commands in your terminal:

```
# wp-content/themes/flynt
composer install   # Install PHP dependencies (required before build)
npm i              # Install Node dependencies
npm run build      # Build theme assets
```

6. Open the WordPress back-end and activate the Flynt theme.
7. Run `npm run start` and start developing.

---

## Deployment (Multisite via GitHub Actions)

To deploy this theme to a WordPress multisite using GitHub Actions:

1. Ensure your repository contains this theme folder with all source files, including composer.json and package.json.
2. Use a GitHub Actions workflow that runs `composer install` and `npm run build` before deploying the theme to your multisite environment.
3. Example workflow is provided in `.github/workflows/deploy.yml` (see below).

**Build Steps:**
- `composer install` (installs PHP dependencies)
- `npm ci` (installs Node dependencies)
- `npm run build` (builds theme assets)

**Note:**
- Make sure to commit the built assets (e.g., `dist/` folder) if your deployment process requires them.
- If you use a deployment action, ensure it copies the built theme to the correct multisite location.

---

### Dependencies

* [WordPress](https://wordpress.org/) >= 6.1
* [Node](https://nodejs.org/en/) = 18
* [Composer](https://getcomposer.org/download/) >= 2.4
* [Advanced Custom Fields Pro](https://www.advancedcustomfields.com/pro/) >= 6.0

## Usage

In your terminal, navigate to `<your-project>/wp-content/themes/flynt` and run `npm start`. This will start the webpack dev server.

All files in `assets` and `Components` will now be watched for changes and compiled to the `dist` folder. Happy coding!

Flynt comes with a ready to use Base Style built according to our best practices for building simple, maintainable components. Go to `domain/BaseStyle` to see it in action.

### Assets

The `./assets` folder contains all global JavaScript, SCSS, images, and font files for the theme. Files inside this folder are watched for changes and compile to `./dist`.

The `main.scss` file is compiled to `./dist/assets/main.css` which is enqueued in the front-end.

The `admin.scss` file is compiled to `./dist/assets/admin.css` which is enqueued in the administrator back-end of WordPress, so styles added to this file will take effect only in the back-end.

### Lib & Inc

The `./lib` folder includes helper functions and basic setup logic. *You will most likely not need to modify any files inside `./lib`.* All files in the `./lib` folder are autoloaded via PSR-4.

The `./inc` folder is a more organised version of WordPress' `functions.php` and contains all custom theme logic. All files in the `./inc` folder are automatically required.

For organisation, `./inc` has three subfolders. We recommend using these three folders to keep the theme well-structured:

* `customPostTypes`<br> Use this folder to register custom WordPress post types.
* `customTaxonomies`<br> Use this folder to register custom WordPress taxonomies.
* `fieldGroups`<br> Use this folder to register Advanced Custom Fields field groups. (See [Field Groups](#field-groups) for more information.)

After the files from `./lib` and `./inc` are loaded, all [components](#components) from the `./Components` folder are loaded.

### Page Templates

Flynt uses [Timber](https://www.upstatement.com/timber/) to structure its page templates and [Twig](https://twig.symfony.com/) for rendering them. [Timber's documentation](https://timber.github.io/docs/) is extensive and up to date, so be sure to get familiar with it.

There is one Twig function added in Flynt to render components into templates:

* `renderComponent(componentName, data)` renders a single component. [For example, in the `index.twig` template](https://github.com/flyntwp/flynt/tree/master/templates/index.twig).

Besides the main document structure (in `./templates/_document.twig`), everything else is a component.

### Components

A component is a self-contained building-block. Each component contains its own layout, its ACF fields, PHP logic, scripts, and styles.

```
  ExampleComponent/
  ├── functions.php
  ├── index.twig
  ├── README.md
  ├── screenshot.png
  ├── script.js
  ├── style.scss
```

The `functions.php` file for every component in the `./Components` folder is executed during the WordPress action `after_setup_theme`. [This is run from the `./functions.php` file of the theme.](https://github.com/flyntwp/flynt/tree/master/functions.php)

To render components into a template, see [Page Templates](#page-templates).

### Advanced Custom Fields

Defining Advanced Custom Fields (ACF) can be done in `functions.php` for each component. As a best practise, we recommend defining your fields inside a function named `getACFLayout()` which you can then call in a [field group](#field-groups).

For example:

```php
namespace Flynt\Components\BlockWysiwyg;

function getACFLayout()
{
    return [
        'name' => 'blockWysiwyg',
        'label' => __('Block: Wysiwyg', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentHtml',
                'type' => 'wysiwyg',
                'delay' => 1,
                'media_upload' => 0,
                'required' => 1,
            ],
        ]
    ];
}
```

### Field Groups

Field groups are needed to show registered fields in the WordPress back-end. All field groups are created in the `./inc/fieldGroups` folder. Two field groups exist by default: [`pageComponents.php`](https://github.com/flyntwp/flynt/tree/master/inc/fieldGroups/pageComponents.php) and [`postComponents.php`](https://github.com/flyntwp/flynt/tree/master/inc/fieldGroups/postComponents.php).

We call the function `getACFLayout()` defined in the `functions.php` file of each component to load fields into a field group.

For example:

```php
use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pageComponents',
        'title' => 'Page Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pageComponents',
                'label' => __('Page Components', 'flynt'),
                'type' => 'flexible_content',
                'button_label' => __('Add Component', 'flynt'),
                'layouts' => [
                    Components\BlockWysiwyg\getACFLayout(),
                ]
            ]
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page'
                ],
                [
                    'param' => 'page_type',
                    'operator' => '!=',
                    'value' => 'posts_page'
                ]
            ]
        ]
    ]);
});
```

Here we use the [ACF Field Group Composer](https://github.com/flyntwp/acf-field-group-composer) plugin, which provides the advantage that all fields automatically get a unique key.

### ACF Option Pages

Flynt includes several utility functions for creating Advanced Custom Fields options pages. Briefly, these are:

* `Flynt\Utils\Options::addTranslatable`<br> Adds fields into a new group inside the Translatable Options options page. When used with the WPML plugin, these fields will be returned in the current language.
* `Flynt\Utils\Options::addGlobal`<br> Adds fields into a new group inside the Global Options options page. When used with WPML, these fields will always be returned from the primary language. In this way these fields are *global* and cannot be translated.
* `Flynt\Utils\Options::getTranslatable` <br> Retrieve a translatable option.
* `Flynt\Utils\Options::getGlobal` <br> Retrieve a global option.

### Timber Dynamic Resize

Timber provides [a `resize` filter to resize images](https://timber.github.io/docs/reference/timber-imagehelper/#resize) on first page load. Resizing many images at the same time can result in a server timeout. That's why Flynt provides a `resizeDynamic` filter, that resizes images asynchronously upon first request of the image itself. Resized images are stored in `uploads/resized`. To regenerate all image sizes and file versions, delete the folder.

To enable Dynamic Resize, go to **Global Options -> Timber Dynamic Resize**.

#### Troubleshooting

​
If `resizedDynamic` is enabled and image requests result in 404 errors, try the following solutions:
​

1. If you're using nginx and the server (not WordPress) responds with a 404 error, check your server configuration against [the recommended standard](https://wordpress.org/support/article/nginx/#general-wordpress-rules). If the standard configuration cannot be used, resolve the image requests correctly by adding the following rule to your configuration:

```nginx
location ~ "^(.*)/wp-content/uploads/(.*)$" {
  try_files $uri $uri/ /index.php$is_args$args;
}
```

2. Some plugins (like WPML) manipulate the `home_url` in such a way that `resizeDynamic` cannot resolve the path to images correctly. In that case, set the relative upload path manually in **Global Options -> Timber Dynamic Resize**. Example: The relative upload path in Bedrock installs with WPML needs to bet set to `app/uploads`.

### Twig Extensions

#### `readingTime` (Type: Filter)

Returns the reading time of a string in minutes.

```twig
{{ 'This is a string'|readingTime }}
```

_Example from [Components/GridPostsArchive/index.twig](./Components/GridPostsArchive/index.twig)_

---

#### `renderComponent($componentName, $data)` (Type: Function)

Renders a component. [See Page Templates](#page-templates).

```twig
{% for component in post.meta('pageComponents') %}
    {{ renderComponent(component) }}
{% endfor %}
```

_Example from [templates/page.twig](./templates/page.twig)_

---

#### `placeholderImage($width, $height, $color = null)` (Type: Function)

Useful in combination with lazysizes for lazy loading. Returns a "data:image/svg+xml;base64" placeholder image.

```twig
{{ placeholderImage(768, (768 / image.aspect)|round, 'rgba(125, 125, 125, 0.1)') }}
```

_Example from [Components/BlockImage/index.twig](./Components/BlockImage/index.twig)_

---

#### `resizeDynamic($src, $w, $h = 0, $crop = 'default', $force = false)` (Type: Filter)

Resizes an image dynamically. [See Timber Dynamic Resize](#timber-dynamic-resize).

```twig
{{ post.thumbnail.src|resizeDynamic(1920, (1920 / 3 * 2)|round, 'center') }}
```

_Example from [Components/BlockImage/index.twig](./Components/BlockImage/index.twig)_

---

## Troubleshooting

### Images

In some setups images may not show up, returning a 404 by the server.

The most common reason for this is that you are using nginx and your server is not set up in the default way. You can see that this is the case, if an image url return a 404 from nginx, not from WordPress itself.

In this case, please add something like

```nginx
location ~ "^(.*)/wp-content/uploads/(.*)$" {
  try_files $uri $uri/ /index.php$is_args$args;
}
```

to your site config.

Other issues might come from Flynt not being able to determine the relative url of your uploads folder. If you have a non-standard WordPress folder structure, or if you use a plugin that manipulates `home_url` (for example, [WPML](https://wpml.org/)) this can cause problems when using `resizeDynamic`.

In this care try to set the relative upload path manually and refresh the permalink settings in the back-end:

```php
add_filter('Flynt/TimberDynamicResize/relativeUploadDir', function () {
    return 'app/uploads'; // Example for Bedrock installs.
});
```

## Maintainers

This project is maintained by [bleech](https://github.com/bleech).

The main people in charge of this repo are:

* [Steffen Bewersdorff](https://github.com/steffenbew)
* [Dominik Tränklein](https://github.com/domtra)

## Contributing

To contribute, please use GitHub [issues](https://github.com/flyntwp/flynt/issues). Pull requests are accepted. Please also take a moment to read the [Contributing Guidelines](https://github.com/flyntwp/guidelines/blob/master/CONTRIBUTING.md) and [Code of Conduct](https://github.com/flyntwp/guidelines/blob/master/CODE_OF_CONDUCT.md).

If editing the README, please conform to the [standard-readme](https://github.com/RichardLitt/standard-readme) specification.

## License

MIT © [bleech](https://www.bleech.de)
