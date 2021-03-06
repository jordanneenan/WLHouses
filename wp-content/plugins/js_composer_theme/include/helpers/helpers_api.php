<?php
/**
 * @param $attributes
 *
 * @since 4.2
 */
function vc_map( $attributes ) {
	if ( ! isset( $attributes['base'] ) ) {
		trigger_error( __( "Wrong vc_map object. Base attribute is required", 'js_composer' ), E_USER_ERROR );
		die();
	}
	WPBMap::map( $attributes['base'], $attributes );
}

/* Backwards compatibility  **/
/**
 * @param $attributes
 *
 * @deprecated, use vc_map instead
 */
function wpb_map( $attributes ) {
	vc_map( $attributes );
}

/**
 * @param $shortcode
 *
 * @since 4.2
 */
function vc_remove_element( $shortcode ) {
	WPBMap::dropShortcode( $shortcode );
}

/* Backwards compatibility  **/
/**
 * @param $shortcode
 *
 * @since 4.2
 * @deprecated use vc_remove_element instead
 */
function wpb_remove( $shortcode ) {
	vc_remove_element( $shortcode );
}

/**
 * Add new shortcode param.
 *
 * @since 4.2
 *
 * @param $shortcode - tag for shortcode
 * @param $attributes - attribute settings
 */
function vc_add_param( $shortcode, $attributes ) {
	WPBMap::addParam( $shortcode, $attributes );
}

/**
 * Mass shortcode params adding function
 *
 * @since 4.3
 *
 * @param $shortcode - tag for shortcode
 * @param $attributes - list of attributes arrays
 */
function vc_add_params( $shortcode, $attributes ) {
	foreach ( $attributes as $attr ) {
		vc_add_param( $shortcode, $attr );
	}
}

/**
 * Backwards compatibility
 *
 * @param $shortcode
 * @param $attributes
 *
 * @since 4.2
 * @deprecated
 */
function wpb_add_param( $shortcode, $attributes ) {
	vc_add_param( $shortcode, $attributes );
}

/**
 * Shorthand function for WPBMap::modify
 *
 * @param $name
 * @param $setting
 * @param string $value
 *
 * @since 4.2
 * @return array|bool
 */
function vc_map_update( $name = '', $setting = '', $value = '' ) {
	return WPBMap::modify( $name, $setting, $value );
}


if ( ! function_exists( 'vc_set_shortcodes_parent_templates_dir' ) ) {
     /**
      * Sets directory where Visual Composer should look for template files for content elements.
      *
      * @param string full directory path to new template directory with trailing slash
      */
     function vc_set_shortcodes_parent_templates_dir( $dir ) {
          vc_manager()->setCustomUserShortcodesParentTemplateDir( $dir );
     }
}
if ( ! function_exists( 'vc_shortcodes_theme_parent_templates_dir' ) ) {
     /**
      * Get custom theme template path
      *
      * @param $template - filename for template
      * @return string
      */
     function vc_shortcodes_theme_parent_templates_dir( $template ) {
          return vc_manager()->getShortcodesParentTemplateDir( $template );
     }
}



/**
 * Shorthand function for WPBMap::mutateParam
 *
 * @param $name
 * @param array $attribute
 *
 * @since 4.2
 * @return bool
 */
function vc_update_shortcode_param( $name, $attribute = Array() ) {
	return WPBMap::mutateParam( $name, $attribute );
}

/**
 * Shorthand function for WPBMap::dropParam
 *
 * @param $name
 * @param $attribute_name
 *
 * @since 4.2
 * @return bool
 */
function vc_remove_param( $name = '', $attribute_name = '' ) {
	return WPBMap::dropParam( $name, $attribute_name );
}

if ( ! function_exists( 'vc_set_as_theme' ) ) {
	/**
	 * Sets plugin as theme plugin.
	 *
	 * @param bool $disable_updater - If value is true disables auto updater options.
	 *
	 * @since 4.2
	 */
	function vc_set_as_theme( $disable_updater = false ) {
		vc_manager()->setIsAsTheme( true );
		//    	$composer = WPBakeryVisualComposer::getInstance();
		//    	$composer->setSettingsAsTheme();
		//    	if($disable_updater) $composer->disableUpdater(); TODO: disable update
		$disable_updater && vc_manager()->disableUpdater();
	}
}
if ( ! function_exists( 'vc_is_as_theme' ) ) {
	/**
	 * Is VC as-theme-plugin.
	 * @since 4.2
	 * @return bool
	 */
	function vc_is_as_theme() {
		return vc_manager()->isAsTheme();
	}
}
if ( ! function_exists( 'vc_is_updater_disabled' ) ) {
	/**
	 * @since 4.2
	 * @return bool
	 */
	function vc_is_updater_disabled() {
		return vc_manager()->isUpdaterDisabled();

	}
}
if ( ! function_exists( 'vc_default_editor_post_types' ) ) {
	/**
	 * Returns list of default post type.
	 * @since 4.2
	 * @return bool
	 */
	function vc_default_editor_post_types() {
		return vc_manager()->editorDefaultPostTypes();
	}
}
if ( ! function_exists( 'vc_set_default_editor_post_types' ) ) {
	/**
	 * Set post types for VC editor.
	 * @since 4.2
	 *
	 * @param array $list - list of valid post types to set
	 */
	function vc_set_default_editor_post_types( array $list ) {
		vc_manager()->setEditorDefaultPostTypes( $list );
	}
}
if ( ! function_exists( ( 'vc_editor_post_types' ) ) ) {
	/**
	 * Returns list of post types where VC editor is enabled.
	 * @since 4.2
	 * @return array
	 */
	function vc_editor_post_types() {
		return vc_manager()->editorPostTypes();
	}
}
if ( ! function_exists( ( 'vc_editor_set_post_types' ) ) ) {
	/**
	 * Set list of post types where VC editor is enabled.
	 * @since 4.4
	 *
	 * @param array $post_types
	 *
	 * @return array
	 */
	function vc_editor_set_post_types( array $post_types ) {
		vc_manager()->setEditorPostTypes( $post_types );
	}
}
if ( ! function_exists( 'vc_mode' ) ) {
	/**
	 * Return current VC mode.
	 * @since 4.2
	 * @see Vc_Mapper::$mode
	 * @return string
	 */
	function vc_mode() {
		return vc_manager()->mode();
	}
}
if ( ! function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	/**
	 * Sets directory where Visual Composer should look for template files for content elements.
	 * @since 4.2
	 *
	 * @param string - full directory path to new template directory with trailing slash
	 */
	function vc_set_shortcodes_templates_dir( $dir ) {
		vc_manager()->setCustomUserShortcodesTemplateDir( $dir );
	}
}
if ( ! function_exists( 'vc_shortcodes_theme_templates_dir' ) ) {
	/**
	 * Get custom theme template path
	 * @since 4.2
	 *
	 * @param $template - filename for template
	 *
	 * @return string
	 */
	function vc_shortcodes_theme_templates_dir( $template ) {
		return vc_manager()->getShortcodesTemplateDir( $template );
	}
}
if ( ! function_exists( 'vc_set_template_dir' ) ) {
	/**
	 * Sets directory where Visual Composer should look for template files for content elements.
	 * @since 4.2
	 * @deprecated 4.2
	 *
	 * @param string - full directory path to new template directory with trailing slash
	 */
	function vc_set_template_dir( $dir ) {
		vc_set_shortcodes_templates_dir( $dir );
	}
}
/**
 * @param bool $value
 *
 * @since 4.3
 */
function set_vc_is_inline( $value = true ) {
	global $vc_is_inline;
	$vc_is_inline = $value;
}

/**
 * New Vc now called Frontend editor
 * @deprecated
 * @return Vc_Frontend_Editor
 * @since 4.3
 */
function new_vc() {
	return vc_frontend_editor();
}

/**
 * Disable frontend editor for VC
 * @since 4.3
 *
 * @param bool $disable
 */
function vc_disable_frontend( $disable = true ) {
	vc_frontend_editor()->disableInline( $disable );
}

/**
 * Check is front end enabled.
 * @since 4.3
 * @return bool
 */
function vc_enabled_frontend() {
	return vc_frontend_editor()->inlineEnabled();
}

if ( ! function_exists( 'vc_add_default_templates' ) ) {
	/**
	 * Add custom template in default templates list
	 *
	 * @param array $data | template data (name, content, custom_class, image_path)
	 *
	 * @since 4.3
	 * @return bool
	 */
	function vc_add_default_templates( $data ) {
		return visual_composer()->templatesPanelEditor()->addDefaultTemplates( $data );
	}
}

function vc_map_integrate_shortcode( $shortcode, $field_prefix = '', $group_prefix = '', $change_fields = null, $dependency = null ) {
	$shortcode_data = WPBMap::getShortCode( $shortcode );
	if ( is_array( $shortcode_data ) && ! empty( $shortcode_data ) ) {
		/**
		 * @var $shortcode WPBakeryShortCodeFishBones
		 */
		$params = isset( $shortcode_data['params'] ) && ! empty( $shortcode_data['params'] ) ? $shortcode_data['params'] : false;
		if ( is_array( $params ) && ! empty( $params ) ) {
			$keys = array_keys( $params );
			for ( $i = 0; $i < count( $keys ); $i ++ ) {
				$param = &$params[ $keys[ $i ] ]; // Note! passed by reference to automatically update data
				if ( isset( $change_fields ) ) {
					$param = vc_map_integrate_include_exclude_fields( $param, $change_fields );
					if ( empty( $param ) ) {
						continue;
					}
				}
				if ( ! empty( $group_prefix ) ) {
					if ( isset( $param['group'] ) ) {
						$param['group'] = $group_prefix . ': ' . $param['group'];
					} else {
						$param['group'] = $group_prefix;
					}
				}
				if ( ! empty( $field_prefix ) && isset( $param['param_name'] ) ) {
					$param['param_name'] = $field_prefix . $param['param_name'];
					if ( isset( $param['dependency'] ) && is_array( $param['dependency'] ) && isset( $param['dependency']['element'] ) ) {
						$param['dependency']['element'] = $field_prefix . $param['dependency']['element'];
					}
					$param = vc_map_integrate_add_dependency( $param, $dependency );

				} else if ( ! empty( $dependency ) ) {
					$param = vc_map_integrate_add_dependency( $param, $dependency );
				}
				$param['integrated_shortcode'] = $shortcode;
				$param['integrated_shortcode_field'] = $field_prefix;
			}
		}

		return is_array( $params ) ? array_filter( $params ) : false;
	}

	return false;
}

/**
 * Used to filter params (include/exclude)
 *
 * @internal
 *
 * @param $param
 * @param $change_fields
 *
 * @return array|null
 */
function vc_map_integrate_include_exclude_fields( $param, $change_fields ) {
	if ( is_array( $change_fields ) ) {
		if ( isset( $change_fields['exclude'] ) && in_array( $param['param_name'], $change_fields['exclude'] ) ) {
			$param = null;

			return $param; // to prevent group adding to $param
		} else if ( isset( $change_fields['exclude_regex'] ) ) {
			if ( is_array( $change_fields['exclude_regex'] ) && ! empty( $change_fields['exclude_regex'] ) ) {
				$break_foreach = false;
				foreach ( $change_fields['exclude_regex'] as $regex ) {
					if ( @preg_match( $regex, null ) === false ) {
						// Regular expression is invalid, (don't remove @).
					} else {
						if ( preg_match( $regex, $param['param_name'] ) ) {
							$param = null;
							$break_foreach = true;
						}
					}
					if ( $break_foreach ) {
						break;
					}
				}
				if ( $break_foreach ) {
					return $param; // to prevent group adding to $param
				}
			} else if ( is_string( $change_fields['exclude_regex'] ) && strlen( $change_fields['exclude_regex'] ) > 0 ) {
				if ( @preg_match( $change_fields['exclude_regex'], null ) === false ) {
					// Regular expression is invalid, (don't remove @).
				} else {
					if ( preg_match( $change_fields['exclude_regex'], $param['param_name'] ) ) {
						$param = null;

						return $param; // to prevent group adding to $param
					}
				}
			}
		}

		if ( isset( $change_fields['include_only'] ) && ! in_array( $param['param_name'], $change_fields['include_only'] ) ) {
			// if we want to enclude only some fields
			$param = null;

			return $param; // to prevent group adding to $param
		} else if ( isset( $change_fields['include_only_regex'] ) ) {
			if ( is_array( $change_fields['include_only_regex'] ) && ! empty( $change_fields['include_only_regex'] ) ) {
				$break_foreach = false;
				foreach ( $change_fields['include_only_regex'] as $regex ) {
					if ( @preg_match( $regex, null ) === false ) {
						// Regular expression is invalid, (don't remove @).
					} else {
						if ( ! preg_match( $regex, $param['param_name'] ) ) {
							$param = null;
							$break_foreach = true;
						}
					}
					if ( $break_foreach ) {
						break;
					}
				}
				if ( $break_foreach ) {
					return $param; // to prevent group adding to $param
				}
			} else if ( is_string( $change_fields['include_only_regex'] ) && strlen( $change_fields['include_only_regex'] ) > 0 ) {
				if ( @preg_match( $change_fields['include_only_regex'], null ) === false ) {
					// Regular expression is invalid, (don't remove @).
				} else {
					if ( ! preg_match( $change_fields['include_only_regex'], $param['param_name'] ) ) {
						$param = null;

						return $param; // to prevent group adding to $param
					}
				}
			}
		}
	}

	return $param;
}

/**
 * @internal used to add dependency to existed param
 *
 * @param $param
 * @param $dependency
 *
 * @return array
 */
function vc_map_integrate_add_dependency( $param, $dependency ) {
	//activator must be used for all elements who doesn't have 'dependency'
	if ( ! empty( $dependency ) && ( ! isset( $param['dependency'] ) || empty( $param['dependency'] ) ) ) {
		if ( is_array( $dependency ) ) {
			$param['dependency'] = $dependency;
		}
	}

	return $param;
}

function vc_map_integrate_get_params( $base_shortcode, $integrated_shortcode, $field_prefix = '' ) {
	$shortcode_data = WPBMap::getShortCode( $base_shortcode );
	$params = array();
	if ( is_array( $shortcode_data ) && is_array( $shortcode_data['params'] ) && ! empty( $shortcode_data['params'] ) ) {
		foreach ( $shortcode_data['params'] as $param ) {
			if ( is_array( $param ) && isset( $param['integrated_shortcode'] ) && $integrated_shortcode == $param['integrated_shortcode'] ) {
				if ( ! empty( $field_prefix ) ) {
					if ( isset( $param['integrated_shortcode_field'] ) && $field_prefix == $param['integrated_shortcode_field'] ) {
						$params[] = $param;
					}
				} else {
					$params[] = $param;
				}
			}
		}
	}

	return $params;
}

function vc_map_integrate_get_atts( $base_shortcode, $integrated_shortcode, $field_prefix = '' ) {
	$params = vc_map_integrate_get_params( $base_shortcode, $integrated_shortcode, $field_prefix );
	$atts = array();
	if ( is_array( $params ) && ! empty( $params ) ) {
		foreach ( $params as $param ) {
			$value = '';
			if ( isset( $param['value'] ) ) {
				if ( isset( $param['std'] ) ) {
					$value = $param['std'];
				} else if ( is_array( $param['value'] ) ) {
					reset( $param['value'] );
					$value = current( $param['value'] );
				} else {
					$value = $param['value'];
				}
			}
			$atts[ $param['param_name'] ] = $value;
		}
	}

	return $atts;
}

function vc_map_integrate_parse_atts( $base_shortcode, $integrated_shortcode, $atts, $field_prefix = '' ) {
	$params = vc_map_integrate_get_params( $base_shortcode, $integrated_shortcode, $field_prefix );
	$data = array();
	if ( is_array( $params ) && ! empty( $params ) ) {
		foreach ( $params as $param ) {
			if ( isset( $atts[ $param['param_name'] ] ) ) {
				$value = $atts[ $param['param_name'] ];
			}
			if ( isset( $value ) ) {
				$key = $param['param_name'];
				if ( strlen( $field_prefix ) > 0 ) {
					$key = substr( $key, strlen( $field_prefix ) );
				}
				$data[ $key ] = $value;
			}
		}
	}

	return $data;
}

function vc_map_add_css_animation( $label = true ) {
	$data = array(
		'type' => 'dropdown',
		'heading' => __( 'CSS Animation', 'js_composer' ),
		'param_name' => 'css_animation',
		'admin_label' => $label,
		'value' => array(
			__( 'No', 'js_composer' ) => '',
			__( 'Top to bottom', 'js_composer' ) => 'top-to-bottom',
			__( 'Bottom to top', 'js_composer' ) => 'bottom-to-top',
			__( 'Left to right', 'js_composer' ) => 'left-to-right',
			__( 'Right to left', 'js_composer' ) => 'right-to-left',
			__( 'Appear from center', 'js_composer' ) => 'appear'
		),
		'description' => __( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'js_composer' )
	);

	return apply_filters( 'vc_map_add_css_animation', $data, $label );
}

/**
 * Get settings of the mapped shortcode.
 *
 * @param $tag
 *
 * @since 4.4.3
 * @return array|null - settings or null if shortcode not mapped
 */
function vc_get_shortcode( $tag ) {
	return WPBMap::getShortCode( $tag );
}

/**
 * Remove all mapped shortcodes and the moment when function is called.
 *
 * @since 4.5
 */
function vc_remove_all_elements() {
	WPBMap::dropAllShortcodes();
}
