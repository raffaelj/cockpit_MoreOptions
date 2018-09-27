# MoreOptions for Cockpit CMS

Copy this folder to `addons/MoreOptions`.

work in progress, may completely change in the future - it's more a test addon, but it works

## Features

* adds a new tab to collections edit page with more options
  * collection types for grouping
  * color picker for CD colors
  * a code editor field with all (hidden) collection options
* dashboard widget with grouped collections
* page titles
  * simple, generated from reverse order of route
  * `/collections/collection/name` --> `Name - Collection - Collections - AppName`
  * `/singletons/form/name` --> `Name - Form - Singletons - AppName` and so on
  * one fallback: `/collections/entry/name/5ba6a71733386213b40001e8` --> `Edit - Name - Entry - Collections - AppName`
