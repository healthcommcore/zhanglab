<?php

/**
 * Set count variables so column numbers can be dynamic.
 */
function jackson_preprocess_page (&$vars) {
  $vars['preface'] = count(array_filter(array($vars['page']['preface_one'], $vars['page']['preface_two'], $vars['page']['preface_three'])));
  $vars['bottom'] = count(array_filter(array($vars['page']['bottom_one'], $vars['page']['bottom_two'], $vars['page']['bottom_three'], $vars['page']['bottom_four'])));

	// Add meta description and keywords manually because the homepage has
	// no actual content nodes
	if(drupal_is_front_page()){
		$meta_descr = array(
			'#tag' => 'meta',
			'#attributes' => array(
				'name' => 'description',
				'content' => 'Dana-Farber Cancer Institute and Harvard Medical Schools Zhang Lab studies the molecular pathogenesis of diffused large B cell lymphoma and EBV-associated B cell lymphoma to identify the surveillance mechanism of the immune system on tumors and develop strategies to harness immune cells for tumor therapy.'),
		);
		$meta_keys = array(
			'#tag' => 'meta',
			'#attributes' => array(
				'name' => 'keywords',
				'content' => 'zhang lab, zhang laboratory, baochun zhang, dfci zhang lab, baochun zhang, harvard research lab, harvard molecular pathogenesis, dfci tumor therapy research, dfci immune system and tumor cells, harvard tumor and immune cell research'),
		);
		drupal_add_html_head($meta_descr, 'meta_description');
		drupal_add_html_head($meta_keys, 'meta_keywords');
	}

}

