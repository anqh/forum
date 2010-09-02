<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Forum Topics
 *
 * @package    Forum
 * @author     Antti Qvickström
 * @copyright  (c) 2010 Antti Qvickström
 * @license    http://www.opensource.org/licenses/mit-license.php MIT license
 */
?>

<?php if (count($topics)): ?>

	<?php foreach ($topics as $topic): ?>

	<article>
		<header>
			<small class="ago"><?php echo HTML::time(Date::short_span($topic->last_posted, true, true), $topic->last_posted) ?></small>
			<?php echo HTML::anchor(Route::model($topic, '?page=last#last'), HTML::chars($topic->name)) ?>
		</header>
		<?php echo HTML::icon_value(array(':replies' => $topic->post_count - 1), ':replies reply', ':replies replies', 'posts') ?>
		<?php echo HTML::user($topic->last_post->author, $topic->last_poster) ?>
	</article>

	<?php endforeach; ?>

<?php else: ?>

	<article class="empty">
		<?php echo __('No topics yet.') ?>
	</article>

<?php endif; ?>
