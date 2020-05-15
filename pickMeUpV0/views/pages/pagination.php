<ul  id="pagination">
                      <?php
                        $num_of_movies = get_pagination_count();
                        for($i = 0; $i < $num_of_movies; $i++):
                      ?>
                        <li class="page-item">
                          <a href="#" class="transport-pagination" data-limit="<?= $i ?>"><?= $i+1 ?></a>
                        </li>
                      <?php endfor; ?>
</ul>  