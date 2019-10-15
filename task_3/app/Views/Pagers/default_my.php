<?php
/**
 * @var \CodeIgniter\Pager\PagerRenderer $pager
 */

$pager->setSurroundCount(0);
?>
<nav>
<!-------------------------------------	Clicks into the next page START	------------------------------->
	<ul class="pager">
		<li <?= $pager->hasPrevious() ? '' : 'class="disabled"' ?>>
			<a href="<?= $pager->getPrevious() ?? '#' ?>">
				<span aria-hidden="true"> &lt; </span>
			</a>
		</li>
<!-------------------------------------	Clicks into the next page END	------------------------------->

		<!----------------------------	Links generator START	------------------------------->

		<?php foreach ($pager->links() as $link) : ?>

			<!-------	The first Link has next View if we are not on the first page START-------------->
			<?php if ($link['uri'] === $pager->getCurrent() && $link['uri'] !== $pager->getFirst()): ?>
				<li>
					<a href="<?= $pager->getFirst() ?>">
						<span><?= substr($pager->getFirst(), -1) ?></span>
					</a>
				</li>
				<li>
					&hellip;
				</li>
				<?php if ($pager->getNext() !== $pager->getCurrent()): ?>

				<?php endif; ?>
			<?php endif; ?>
			<!-------	The first Link has next View if we are on the last page START-------------->


			<?php if ($link['uri'] === $pager->getCurrent()): ?>

				<!-------------------------------------	The current page STAR --------------------------->
				<li <?= $link['active'] ? 'class="active"' : '' ?> >
					<span><?= $link['title'] ?></span>
				</li>
				<!-------------------------------------	The current page END ------------------------------->

				<!---------------------	Link to the next page and view the symbol &hellip;  START	----------------->
				<?php if ($pager->hasNext() && $pager->getNext() != $pager->getLast()): ?>
					<li>
						<a href="<?= $pager->getNext() ?>">
							<span><?= $link['title'] + 1 ?></span>
						</a>
					</li>
					<li>
						&hellip;
					</li>
					<li>
						<a href="<?= $pager->getLast() ?>">
							<span><?= substr($pager->getLast(), -1) ?></span>
						</a>
					</li>
				<?php endif; ?>
				<!---------------------	Link to the next page and view the symbol &hellip; END	----------------->

				<!-------	The Link has next View  if the next page is last (without &hellip;) START --------->
				<?php if ($pager->getNext() == $pager->getLast()): ?>
					<li>
						<a href="<?= $pager->getNext() ?>">
							<span><?= $link['title'] + 1 ?></span>
						</a>
					</li>
				<?php endif; ?>
				<!-------	The Link has next View  if the next page is last (without &hellip;)  START	-------->

			<?php endif; ?>
		<?php endforeach ?>
		<!----------------------------	Links generator END	------------------------------->

<!-------------------------------------	Clicks into the previous START	------------------------------->
		<li <?= $pager->hasNext() ? '' : 'class="disabled"' ?>>
			<a href="<?= $pager->getnext() ?? '#' ?>">
				<span> &gt; </span>
			</a>
		</li>
<!-------------------------------------	Clicks into the previous page END	------------------------------->

	</ul>
</nav>

