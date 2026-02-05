<?php
/**
 * Live Support Widget Configuration
 * Custom implementation for Germannationality platform
 */

class LiveSupportWidget {
    private $widgetSettings = [
        'service_enabled' => true,
        'tawk_property' => '5f8e9c4e4704467e89f0c1e9',
        'tawk_widget' => 'default',
        'load_priority' => 'low',
        'position' => 'bottom_right'
    ];
    
    public function renderWidget() {
        if (!$this->widgetSettings['service_enabled']) {
            return '';
        }
        
        $propertyId = $this->widgetSettings['tawk_property'];
        $widgetId = $this->widgetSettings['tawk_widget'];
        $baseUrl = 'https://embed.tawk.to';
        
        $output = "\n<!-- Live Customer Support Widget -->\n";
        $output .= "<script>\n";
        $output .= "var initLiveSupport=function(){\n";
        $output .= "var w=document.createElement('script');\n";
        $output .= "w.type='text/javascript';\n";
        $output .= "w.async=true;\n";
        $output .= "w.src='{$baseUrl}/{$propertyId}/{$widgetId}';\n";
        $output .= "var f=document.getElementsByTagName('script')[0];\n";
        $output .= "f.parentNode.insertBefore(w,f);\n";
        $output .= "};\n";
        $output .= "window.addEventListener('load',initLiveSupport,false);\n";
        $output .= "</script>\n";
        
        return $output;
    }
}
?>
