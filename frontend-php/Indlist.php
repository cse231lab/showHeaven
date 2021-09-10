<?php
function indList($list)
{
  $modalId = "\"#listModal-" . $list["id"] . '"';
  $editModalId = "\"#editListModal-" . $list["id"] . '"';

  echo "
	<div class=\"col-4 col-md-3 p-1\">
        <div class=\"card text-dark bg-light mb-3\">
          <div class=\"card-header d-flex justify-content-between\">
            <span>
            <form method=\"post\"  action=\"./watchlistupdate.php\" id=\"fav-list-" . $list["id"] . "\">
              <input type=\"text\" name=\"add_list_id\" class=\"d-none\" value=\"" .  $list["id"] . "\" />
              " . (isset($_SESSION["id"]) && $_SESSION["id"] != -1 ?
    "<input type=\"text\" name=\"user_id\" class=\"d-none\" value=\"" .  $_SESSION["id"] . "\" />"
    : "") .
    "
              <button class=\"btn p-0\" type=\"submit\" form=\"fav-list-" . $list["id"] . "\">
                <i class=\"bi bi-heart-fill\"></i>
              </button>
              " . $list["follow"] . "
              </form>
            </span>
            <span>
              By
              <a
                class=\"text-dark\"
                href=\"./profile.php?handle=" . $list["handle"] . "\"
              >
              " . $list["handle"] . "
              </a>
            </span>
          </div>
          <div class=\"card-body\">
            <h5 class=\"card-title\">
              <button
                type=\"button\"
                class=\"btn ps-0\"
                onclick='openModal($modalId)'
              '
              >
              " . $list["title"] . "
              </button>
            </h5>
          </div>
        </div>
      </div>

      <div
        class=\"modal fade\"
        id=$modalId 
        tabIndex=\"-1\"
        aria-hidden=\"true\"
      >
        <div class=\"modal-dialog modal-dialog-centered modal-dialog-scrollable\">
          <div class=\"modal-content pb-3\">
            <div class=\"modal-header\">
              <div class=\"modal-title d-flex justify-content-between align-items-center w-100\">
                <h4>" . $list["title"] . "</h4>

                <div class=\"d-flex justify-content-between\">
                  " . ((isset($_SESSION["id"]) && $_SESSION["id"] == $list["user_id"]) ?
      ("<span>
                  <form action=\"./watchlistupdate.php\" method=\"POST\">
                    <input name=\"deleteList\" class=\"d-none\">
                    <button class=\"btn p-0 \">
                      <i class=\"bi bi-trash-fill\"></i>
                    </button>
                  </form>
                  </span>
                  <span>
                    <a class=\"nav-link text-dark\" href=\"showlist.php?list_id=" . $list["id"] . "\"
                    >
                      <i class=\"bi bi-pencil-square\"></i>
                    </button>
                  </span>
                  <span>") : "")
    .
    "
                  <form method=\"post\"  action=\"./watchlistupdate.php\" id=\"fav-list-" . $list["id"] . "\">
                    <input type=\"text\" name=\"add_list_id\" class=\"d-none\" value=\"" .  $list["id"] . "\" />
                    " . (isset($_SESSION["id"]) && $_SESSION["id"] != -1 ?
      "<input type=\"text\" name=\"user_id\" class=\"d-none\" value=\"" .  $_SESSION["id"] . "\" />"
      : "") .
    "
                    <button class=\"btn p-0\" type=\"submit\" form=\"fav-list-" . $list["id"] . "\">
                      <i class=\"bi bi-heart-fill\"></i>
                    </button>
                    " . $list["follow"] . "
                    </form>
                  </span>
                  <span>
                    <a
                class=\"text-dark\"
                href=\"./profile.php?handle=" . $list["handle"] . "\"
              >
              " . $list["handle"] . "
              </a>
                  </span>
                </div>
              </div>
              <button
                type=\"button\"
                class=\"btn-close\"
                data-bs-dismiss=\"modal\"
                aria-label=\"Close\"
              ></button>
            </div>
            <div class=\"modal-body\">
              <div class=\"list-group\">
              ";

  $items = getListItems($list["id"]);

  foreach ($items as $key => $value) {
    # code...
    echo "
        <div class=\"d-flex align-items-center\">
              <div class=\"col-10\">
                <a
                  href=\"#\"
                  class=\"list-group-item border-0 list-group-item-action d-flex align-items-center\"
                >
                  <div class=\"col-1\">" . strval($key + 1) . "</div>

                  <div class=\"col-3\">
                    <img
                      src=\"" . $value["image"] . "\"
                      class=\"img-fluid rounded-start\"
                      alt=\"...\"
                    />
                  </div>
                  <div class=\"col-6\"> " . $value["name"] . "</div>
                </a>
              </div>
              <div class=\"col-2\">
              <span>
              <form method=\"post\"  action=\"./watchlistupdate.php\" id=\"delete-list-item-" . $list["id"] . "-" . $value["show_id"] . " \">
                <input type=\"text\" name=\"delete_list_item\" class=\"d-none\" value=\"" .  $list["id"] . "\" />
                <input type=\"text\" name=\"delete_list_show_id\" class=\"d-none\" value=\"" .  $value["show_id"] . "\" />
                " . (isset($_SESSION["id"]) && $_SESSION["id"] == $list["user_id"] ?
      "<input type=\"text\" name=\"user_id\" class=\"d-none\" value=\"" .  $_SESSION["id"] . "\" />"
      : "") .
      "
                <button class=\"btn p-0\" type=\"submit\" id=\"delete-list-item-" . $list["id"] . "-" . $value["show_id"] . " \">
                  <i class=\"bi bi-trash-fill\"></i>
                </button>
                " . $list["follow"] . "
                </form>
              </span>
              </div>
            </div>
           ";
  }


  echo "
              </div>
            </div>
          </div>
        </div>
      </div>";


  echo "
  <script type=\"text/javascript\"> 
  
      function openModal(x){
        console.log(x)
        var myModal = new bootstrap.Modal(document.getElementById(x), {
          keyboard: false
        });

        myModal.toggle();
      }
  </script>
  ";
}
