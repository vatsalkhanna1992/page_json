<?php
/**
 * @File
 * Controller to get JSON data.
 */
namespace Drupal\page_json\Controller;

use Drupal\node\NodeInterface;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Access\AccessResult;
use Symfony\Component\HttpFoundation\Response;
use Drupal\node\Entity\Node;

class PageJsonController extends ControllerBase {
  public function jsonData($apikey, $nid) {
    // Get the node.
    $node = Node::load($nid);
    if (isset($node)) {
      // Get node type.
      $type = $node->getType();
      // Load serializer service.
      $serializer = \Drupal::service('serializer');
      // Get configuration from site settings.
      $config = \Drupal::config('system.site');
      $siteapikey = $config->get('siteapikey');
      // Check if apikey matches the one set in the site configuration and node is valid page.
      if ($type === 'page' && $siteapikey === $apikey) {
        // Serialize node into json and return the data.
        $data = $serializer->serialize($node, 'json', ['plugin_id' => 'entity']);
        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
      }
    }
     // Deny access if above condition does not match.
    return array(
      '#type' => 'markup',
      '#markup' => t('<h1>Access Denied</h1>'),
    );
  }
}
