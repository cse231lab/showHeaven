
<?php
function indList($id)
{
	echo "
	<div class=\"col-4 col-md-3 p-1\">
        <div class=\"card text-dark bg-light mb-3\">
          <div class=\"card-header d-flex justify-content-between\">
            <span>
              <button class=\"btn p-0\">
                <i class=\"bi bi-heart-fill\"></i>
              </button>
              8
            </span>
            <span>
              By
              <a
                class=\"text-dark\"
                href={\"/profile?handle=\" + currentList.user.handle}
              >
                @jsdf
              </a>
            </span>
          </div>
          <div class=\"card-body\">
            <h5 class=\"card-title\">
              <button
                type=\"button\"
                class=\"btn ps-0\"
                data-bs-toggle=\"modal\"
                data-bs-target={\"#exampleModal\" + currentList.id.toString()}
              >
                jsdf
              </button>
            </h5>
          </div>
        </div>
      </div>

      <div
        class=\"modal fade\"
        id={\"exampleModal\" + currentList.id.toString()}
        tabIndex={-1}
        aria-labelledby=\"authModal\"
        aria-hidden=\"true\"
      >
        <div class=\"modal-dialog modal-dialog-centered modal-dialog-scrollable\">
          <div class=\"modal-content pb-3\">
            <div class=\"modal-header\">
              <div class=\"modal-title d-flex justify-content-between align-items-center w-100\">
                <h4>jsdf</h4>

                <div class=\"d-flex justify-content-between\">
                  <span>
                    <button class=\"btn p-0 \">
                      <i class=\"bi bi-trash-fill\"></i>
                    </button>
                  </span>
                  <span>
                    <button
                      class=\"btn p-0\"
                      data-bs-toggle=\"modal\"
                      data-bs-target={\"#addModal\" + currentList.id.toString()}
                      data-bs-dismiss=\"modal\"
                    >
                      <i class=\"bi bi-pencil-square\"></i>
                    </button>
                  </span>
                  <span>
                    <button class=\"btn p-0\">
                      <i class=\"bi bi-heart-fill\"></i>
                    </button>
                    8
                  </span>
                  <span>
                    By
                    <a
                      class=\"text-dark\"
                      href={\"/watchlist?user=@\" + currentList.user.handle}
                    >
                      @jsdf
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
                {currentList.shows.map((show, index) => (
                  <>
                    <div class=\"d-flex align-items-center\">
                      <div class=\"col-10\">
                        <a
                          href=\"#\"
                          class=\"list-group-item border-0 list-group-item-action d-flex align-items-center\"
                          key={index.toString() + props.id.toString()}
                        >
                          <div class=\"col-1\">{index + 1}</div>

                          <div class=\"col-3\">
                            <img
                              src={show.image}
                              class=\"img-fluid rounded-start\"
                              alt=\"...\"
                            />
                          </div>
                          <div class=\"col-6\">{show.name}</div>
                        </a>
                      </div>
                      <div class=\"col-2\">
                        <button class=\"btn p-0 \">
                          <i class=\"bi bi-trash-fill\"></i>
                        </button>
                      </div>
                    </div>
                  </>
                ))}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div
        class=\"modal fade\"
        id={\"addModal\" + currentList.id.toString()}
        tabIndex={-1}
        aria-labelledby=\"authModal\"
        aria-hidden=\"true\"
      >
        <div class=\"modal-dialog modal-dialog-centered modal-dialog-scrollable\">
          <div class=\"modal-content pb-3\">
            <div class=\"modal-header\">
              <div class=\"modal-title d-flex justify-content-between align-items-center w-100\">
                <h4>jsdf</h4>

                <div class=\"d-flex justify-content-between\">
                  <span>
                    <button class=\"btn p-0\">
                      <i class=\"bi bi-heart-fill\"></i>
                    </button>
                    8
                  </span>
                  <span>
                    By
                    <a
                      class=\"text-dark\"
                      href={\"/watchlist?user=@\" + currentList.user.handle}
                    >
                      @jsdf
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
                {shows.map((show, index) => (
                  <>
                    <div class=\"d-flex align-items-center\">
                      <div class=\"col-10\">
                        <a
                          href=\"#\"
                          class=\"list-group-item border-0 list-group-item-action d-flex align-items-center\"
                          key={index.toString() + props.id.toString()}
                        >
                          <div class=\"col-1\">{index + 1}</div>

                          <div class=\"col-3\">
                            <img
                              src={show.image}
                              class=\"img-fluid rounded-start\"
                              alt=\"...\"
                            />
                          </div>
                          <div class=\"col-6\">{show.name}</div>
                        </a>
                      </div>
                      <div class=\"col-2\">
                        <button
                          class=\"btn p-0 \"
                          data-bs-dismiss=\"modal\"
                          aria-label=\"Close\"
                        >
                          <i class=\"bi bi-plus-lg\"></i>
                        </button>
                      </div>
                    </div>
                  </>
                ))}
              </div>
            </div>
          </div>
        </div>
      </div>
	";
}
?>

