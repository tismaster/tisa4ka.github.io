<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Map
 *
 * @author CMSHelplive
 */
class CM_Element_Map extends CM_Element
{

    protected $_attributes = array(
        'type' => 'text',
        'class' => 'cm-map-controls cm_map_autocomplete cm-map-controls-uninitialized',
        'onkeydown' => 'cm_prevent_submission(event)'

    );
    protected $jQueryOptions = "";
    private $api_key;

    /* public function getCSSFiles()
      {
      return array(
      );
      } */

    public function __construct($label, $name, $api_key, array $properties = null)
    {
        parent::__construct($label, $name, $properties);
        $this->_attributes['id'] = $name;
        $this->api_key = $api_key;
    }

    public function getJSFiles()
    {
        return array(
            'script_cm_map' => CM_BASE_URL . 'public/js/script_cm_map.js',
            'google_map_api' => $this->_form->getPrefix() . "://maps.googleapis.com/maps/api/js?key=".$this->api_key."&libraries=places&callback=cmInitGoogleApi",
        );
    }

    public function getJSDeps()
    {
        return array(
            'script_cm_map'
        );
    }

    public function jQueryDocumentReady()
    {
        parent::jQueryDocumentReady();
        //echo 'initMap();';
    }

    public function render()
    {
        ?>  
        <div class="cmmap_container">
            <input <?php echo $this->getAttributes(); ?>>
            <div style="height:350px" class="map" id="map<?php echo $this->_attributes['id']; ?>"></div></div>
        <?php
    }

}
