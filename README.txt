CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements
 * Configuration

INTRODUCTION
------------

The Page JSON module provides JSON data of a node if its a page. It takes api key as an input, based on that user needs to trigger the url (For example- "/page_json/{apikey}/{nid}"). If the api key provided matches with the one given in url and node id is a valid page node then, it returns JSON data of the node.


REQUIREMENTS
------------

This module requires serialization module of Drupal core.


CONFIGURATION
-------------

  1. Navigate to Administration > Extend and enable the module.
  2. Navigate to Administration > Configuration > Basic site settings. Set Site API Key textfield.
