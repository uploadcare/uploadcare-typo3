# Typo3 extension for Uploadcare

This is a plugin for [Typo3][3] to work with [Uploadcare][1]

It's based on a [uploadcare-php][4] library.

## Requirements

- Typo3 4.3+
- PHP 5.2+
- php-curl

## Install 

Download last version from https://github.com/uploadcare/uploadcare-typo3#downloads

Install extension using Extension Manager at Typo3 backend.

Follow "Configure" link for the Uploadcare extension and provide public and secret keys.

## Usage

Create or edit any content element.

Set "Content Element Type" to "Uploadcare".

Upload an image using widget.

Provide file operations.

Save the Content Element. Image will be displayed inside your frontend block.

[More information on file operations can be found here][2]

## Downloads 

**1.0.0** [Download](https://ucarecdn.com/888c2f1b-378c-4ed6-ab2b-f9e03e8d8aed/uploadcare-typo3_1.0.0.zip)

[1]: https://uploadcare.com/
[2]: https://uploadcare.com/documentation/reference/basic/cdn.html
[3]: http://typo3.org/
[4]: https://github.com/uploadcare/uploadcare-php