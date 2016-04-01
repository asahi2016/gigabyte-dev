INTRODUCTION
------------
Creating pages with consistently sized, scaled or rotated images can be
accomplished by applying an image style. In this way you can ensure that e.g.
profile pictures all have the same dimension or that high resolution images are
automatically scaled down to a more appropriate size. With the great advantage
that original images are still available, so for instance reusing images in an
overview requiring a different size is easily done.

Natively, you can only specify which image style to use on a content type basis
(i.e., entity's bundle). To overcome this limitation, this module allows to
select which image style should be applied per image (field). Site
administrators can specify which image styles would be appropriate for the
content editor to select and this module makes sure that the selected image
style is applied accordingly.

 * Visit the project page for a full description of this module:
   https://www.drupal.org/project/iss

 * Bug reports and feature suggestions can be submitted via:
   https://www.drupal.org/project/issues/iss


REQUIREMENTS
------------
This module requires that Drupal core's Image module is enabled.


RECOMMENDED MODULES
-------------------
 * Field collection (https://www.drupal.org/project/field_collection)
   The Field collection field provides an easy way to combine multiple fields
   and present them to the main entity (e.g., a node) as one field. This is
   especially handy when multiple Image + Image Style Selector combinations are
   necessary.

 * Field Group (https://www.drupal.org/project/field_group)
   To make clear on an entity form that an Image Style Selector applies
   functionality to a specific Image field, the Field Group module can be used
   to group the fields together (e.g., using a fieldset accompanied with a
   a label).


INSTALLATION
------------
 * Installing this module is like any other regular Drupal module. For more
   information see https://www.drupal.org/documentation/install/modules-themes


CONFIGURATION
-------------
 * Normally, you should first add an Image field to a node. You could also use
   any other entity that is fieldable (such as a Field collection entity). And
   provide some image styles that could be applied to the image. For more
   information see https://www.drupal.org/documentation/modules/image
 * After setting up the Image field and image styles, add a field of the type
   Image Style Selector (to the same entity).
 * On the instance settings page of the Image Style Selector field, select the
   image field where the image style should be applied to and mark the image
   styles that should be available for the content editor.
 * To prevent that the images are shown twice, set the Image field to hidden on
   the entity's manage display tab.
 * That's all there is, you can now add content and select the appropriate style
   that should be applied to the uploaded image.


MAINTAINERS
-----------
Current maintainer(s):
 * dr. Niels Sluijs (MrWatergate) - https://www.drupal.org/user/1096864

This project has been sponsored by:
 * Sicse
   Specialized in creating and managing dynamic web-solutions. In this way our
   clients are able to offer advanced services such as: e-commerce, social
   networking, video publishing, etc. Visit http://www.sicse.nl for more
   information (in Dutch).
