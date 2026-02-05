<?php
/**
 * Performance Enhancement Utilities
 * Custom script loading optimization for Germannationality
 */

class PerformanceHelpers {
    
    // Scripts that must load immediately
    private static $criticalResources = [
        'plugins.bundle.js',
        'scripts.bundle.js'
    ];
    
    /**
     * Generate optimized script tag with intelligent loading strategy
     */
    public static function loadScript($scriptUrl, $forceSync = false) {
        $isCritical = self::isCriticalResource($scriptUrl);
        
        if ($isCritical || $forceSync) {
            return "<script src=\"{$scriptUrl}\"></script>\n";
        }
        
        // Non-critical scripts use deferred loading
        return "<script defer src=\"{$scriptUrl}\"></script>\n";
    }
    
    /**
     * Optimize font stylesheet loading
     */
    public static function loadFont($fontUrl) {
        $optimizedUrl = $fontUrl;
        
        // Add display swap for better perceived performance
        if (strpos($fontUrl, '?') !== false) {
            $optimizedUrl .= '&display=swap';
        } else {
            $optimizedUrl .= '?display=swap';
        }
        
        return "<link rel=\"stylesheet\" href=\"{$optimizedUrl}\" />\n";
    }
    
    private static function isCriticalResource($url) {
        foreach (self::$criticalResources as $critical) {
            if (strpos($url, $critical) !== false) {
                return true;
            }
        }
        return false;
    }
}
?>
