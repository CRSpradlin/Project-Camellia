<?php

namespace Drupal\camellia_module\Controller;

use Drupal\Core\Controller\ControllerBase;

class DefaultController extends ControllerBase {
        public function render(string $route_method, string $route_param) {
          $config = \Drupal::config('camellia_module.settings');

          $this->create_table();

          if($route_method == "view" && $route_param == "gallery"){
            return array(
              '#theme' => 'image_gallery',
            );
          } elseif($route_method == "view"){
            return array(
              '#theme' => 'image_view',
              '#image_id' => $route_param,
            );
          } elseif($route_method == "upload" && $route_param == "image") {
            return array(
              '#theme' => 'uploader',
              '#api_key' => $config->get('camellia_module.api_key'),
              '#domain' => $config->get('camellia_module.domain'),
            );
          } else {
            return array(
              '#title' => 'Page not found',
              '#markup' => 'The requested page could not be found.',
            );
          }
        }

        //Checks for table in drupal database
        private function create_table(){
          $name = 'camelliaModuleDB';
          $database = \Drupal::database();
          if(!$database->schema()->tableExists($name)){

            $schema = [
              'fields' => [
                  'id' => ['type' => 'varchar', 'length' => 41, 'not null' => TRUE],
                  'imageData' => ['type' => 'text', 'not null' => TRUE],
              ],
              'primary key' => ['id'],
            ];

            $database->schema()->createTable($name, $schema);
          }
        }
    }