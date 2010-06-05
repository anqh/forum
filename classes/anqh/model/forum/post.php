<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Forum Post model
 *
 * @package    Forum
 * @author     Antti Qvickström
 * @copyright  (c) 2010 Antti Qvickström
 * @license    http://www.opensource.org/licenses/mit-license.php MIT license
 */
class Anqh_Model_Forum_Post extends Jelly_Model {

	/**
	 * Create new model
	 *
	 * @param  Jelly_Meta  $meta
	 */
	public static function initialize(Jelly_Meta $meta) {
		$meta
			->sorting(array('id' => 'ASC'))
			->fields(array(
				'id'          => new Field_Primary,
				'topic'       => new Field_BelongsTo(array(
					'column'  => 'forum_topic_id',
					'foreign' => 'forum_topic'
				)),
				'area'        => new Field_BelongsTo(array(
					'column'  => 'forum_area_id',
					'foreign' => 'forum_area'
				)),
				'author'      => new Field_BelongsTo(array(
					'column'  => 'author_id',
					'foreign' => 'user',
				)),
				'author_name' => new Field_String,
				'author_ip'   => new Field_String,
				'author_host' => new Field_String,
				'modifies'    => new Field_Integer,
				'parent'      => new Field_BelongsTo(array(
					'column'  => 'parent_id',
					'foreign' => 'forum_post',
				)),
				'created'     => new Field_Timestamp(array(
					'auto_now_create' => true,
				)),
				'modified'    => new Field_Timestamp,
				'post'        => new Field_Text,
			));
	}

}