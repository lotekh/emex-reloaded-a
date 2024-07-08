<div class="breadcrumbs_wrapper ">
    <div class="breadcrumbs pull-left">
        <ul class="flex gap-xs">
            {{--  
            <?php
            $breadcrumbs_array = [];
            if (!empty($this->params['breadcrumbs'])) {
                foreach (array_slice($this->params['breadcrumbs'], -3) as $key => $breadcrumb) {
                    $classes = 'font-xs';
                    if ($key) {
                        $classes .= ' -ml-4';
                    }
                    if ($key == count(array_slice($this->params['breadcrumbs'], -3)) - 1) {
                        $classes .= ' ellipsis';
                    }
                    if (!empty($breadcrumb['url'])) {
                        $breadcrumbs_array[] = '<li class="' . $classes . '"><a href="' . $breadcrumb['url'] . '">' . $breadcrumb['text'] . '</a></li>';
                    } else {
                        $breadcrumbs_array[] = '<li class="' . $classes . '">' . $breadcrumb['text'] . '</li>';
                    }
                }
                echo implode('<li class="separator">/</li>', $breadcrumbs_array);
            }
            ?>
            --}}
        </ul>
    </div>
</div>
