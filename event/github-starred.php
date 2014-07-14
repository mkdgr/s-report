<?php if ($postTag == 'starred') {

    // EntryTitle, EntryUrl, EntryAuthor, EntryContent, EntryImageUrl, EntryPublished, FeedTitle, FeedUrl

    $EntryTitle = $data["EntryTitle"];
    $EntryUrl = $data["EntryUrl"];
    $EntryAuthor = $data["EntryAuthor"];

    ?>

    <article class="Event <?php echo 'Event--' . $theme; ?>">


        <header class="Event-header">

            <i class="Event-header__icon">
                <svg class="icon <?php echo 'icon--' . $theme; ?>" viewBox="0 0 <?php echo $sizeWeightIcon; ?> <?php echo $sizeHeightIcon; ?>">
                    <use xlink:href="#icon-<?php echo $theme; ?>"></use>
                </svg>
            </i>

            <a href="<?php echo $EntryUrl ?>" target="_blank">

                <time title="<?php the_time('j F Y - G:i') ?>" datetime="<?php the_time('Y-m-dTG:i:s') ?>"><?php echo human_time_diff(get_post_time('U'), current_time('timestamp')) ?> önce</time>

                favori listesine yeni bir repo ekledi;

            </a>
        </header>


        <div class="Event-body">

            <p><?php echo $EntryTitle ?></p>

        </div>


    </article>
<?php } ?>
