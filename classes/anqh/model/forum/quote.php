<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Forum Quote model
 *
 * @package    Forum
 * @author     Antti Qvickström
 * @copyright  (c) 2010 Antti Qvickström
 * @license    http://www.opensource.org/licenses/mit-license.php MIT license
 */
class Anqh_Model_Forum_Quote extends Jelly_Model implements Permission_Interface {

	/**
	 * Create new model
	 *
	 * @param  Jelly_Meta  $meta
	 */
	public static function initialize(Jelly_Meta $meta) {
		$meta->fields(array(
			'id' => new Field_Primary,
			'author' => new Field_BelongsTo(array(
				'column'  => 'author_id',
				'foreign' => 'user',
			)),
			'user' => new Field_BelongsTo,
			'topic' => new Field_BelongsTo(array(
				'column'  => 'forum_topic_id',
				'foreign' => 'forum_topic',
			)),
			'post' => new Field_BelongsTo(array(
				'column'  => 'forum_post_id',
				'foreign' => 'forum_post',
			)),
			'created' => new Field_Timestamp(array(
				'auto_now_create' => true,
			)),
		));
	}


	/**
	 * Find quotes by quoted user
	 *
	 * @param   Model_User  $user
	 * @return  Jelly_Collection
	 */
	public static function find_by_user(Model_User $user) {
		return Jelly::select('forum_quote')->where('user_id', '=', $user->id)->execute();
	}


	/**
	 * Check permission
	 *
	 * @param   string      $permission
	 * @param   Model_User  $user
	 * @return  boolean
	 */
	public function has_permission($permission, $user) {
		switch ($permission) {
			case self::PERMISSION_CREATE:
			case self::PERMISSION_DELETE:
			case self::PERMISSION_READ:
			case self::PERMISSION_UPDATE:
		}

		return false;
	}

}