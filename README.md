# Castlegate IT WP SEO Redux #

Simple SEO fields for titles, headings, and descriptions. Includes fields for taxonomies and an options page with SEO fields for the posts index and custom post type archives.

The title and description fields are displayed automatically using WordPress actions and filters. The heading must be added to the child theme, which can be done with the `cgit_seo_heading()` function:

~~~ php
<h1><?= cgit_seo_heading() ?></h1>
~~~

Requires [Advanced Custom Fields Pro](https://www.advancedcustomfields.com/pro/).

## Filters ##

You can override the some of the settings using filters:

*   `cgit_seo_field_args` is the array of parameters used to define the ACF custom fields, including the field location(s).
*   `cgit_seo_post_types` is the array of post types that do have SEO fields.
*   `cgit_seo_post_types_hidden` is the array of post types that do not have SEO fields.
*   `cgit_seo_taxonomies` is the array of taxonomies that do have SEO fields.
*   `cgit_seo_taxonomies_hidden` is the array of taxonomies that do not have SEO fields.
*   `cgit_seo_options_page_args` is the array of parameters used to define the ACF custom fields on the options page, which includes the SEO fields for the posts index and the custom post type archives.
*   `cgit_seo_title` is the SEO title string.
*   `cgit_seo_description` is the SEO description string.
*   `cgit_seo_heading` is the SEO heading string.
