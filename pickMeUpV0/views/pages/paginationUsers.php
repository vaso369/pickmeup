<ul  id="paginationUsers">
                      <?php
                        $num_of_users = get_paginationUsers_count();
                        for($i = 0; $i < $num_of_users; $i++):
                      ?>
                        <li class="page-item">
                          <a href="#" class="users-pagination" data-limit="<?= $i ?>"><?= $i+1 ?></a>
                        </li>
                      <?php endfor; ?>
</ul>  