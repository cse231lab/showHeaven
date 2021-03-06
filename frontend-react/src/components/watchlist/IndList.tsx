interface Props {
  id: number;
}

function IndList(props: Props): JSX.Element {
  let shows = [
    {
      id: 5,
      name: "sdfs",
      image: require("../../images/img1.jpg").default,
    },
    {
      id: 5,
      name: "sdfs",
      image: require("../../images/img1.jpg").default,
    },
  ];

  let currentList = {
    id: Math.floor(Math.random() * 1000 + 1),
    title: "Hello",
    followCnt: Math.floor(Math.random() * 1000 + 1),
    shows: shows,
    user: {
      id: 6,
      handle: "Jess",
    },
  };

  return (
    <>
      <div className="col-4 col-md-3 p-1">
        <div className="card text-dark bg-light mb-3">
          <div className="card-header d-flex justify-content-between">
            <span>
              <button className="btn p-0">
                <i className="bi bi-heart-fill"></i>{" "}
              </button>
              {currentList.followCnt}{" "}
            </span>
            <span>
              By{" "}
              <a
                className="text-dark"
                href={"/profile?handle=" + currentList.user.handle}
              >
                @{currentList.user.handle}
              </a>
            </span>
          </div>
          <div className="card-body">
            <h5 className="card-title">
              <button
                type="button"
                className="btn ps-0"
                data-bs-toggle="modal"
                data-bs-target={"#exampleModal" + currentList.id.toString()}
              >
                {currentList.title}
              </button>
            </h5>
          </div>
        </div>
      </div>

      <div
        className="modal fade"
        id={"exampleModal" + currentList.id.toString()}
        tabIndex={-1}
        aria-labelledby="authModal"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div className="modal-content pb-3">
            <div className="modal-header">
              <div className="modal-title d-flex justify-content-between align-items-center w-100">
                <h4>{currentList.title}</h4>

                <div className="d-flex justify-content-between">
                  <span>
                    <button className="btn p-0 ">
                      <i className="bi bi-trash-fill"></i>
                    </button>
                  </span>
                  <span>
                    <button
                      className="btn p-0"
                      data-bs-toggle="modal"
                      data-bs-target={"#addModal" + currentList.id.toString()}
                      data-bs-dismiss="modal"
                    >
                      <i className="bi bi-pencil-square"></i>
                    </button>
                  </span>
                  <span>
                    <button className="btn p-0">
                      <i className="bi bi-heart-fill"></i>{" "}
                    </button>
                    {currentList.followCnt}{" "}
                  </span>
                  <span>
                    By{" "}
                    <a
                      className="text-dark"
                      href={"/watchlist?user=@" + currentList.user.handle}
                    >
                      @{currentList.user.handle}
                    </a>
                  </span>
                </div>
              </div>
              <button
                type="button"
                className="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div className="modal-body">
              <div className="list-group">
                {currentList.shows.map((show, index) => (
                  <>
                    <div className="d-flex align-items-center">
                      <div className="col-10">
                        <a
                          href="#"
                          className="list-group-item border-0 list-group-item-action d-flex align-items-center"
                          key={index.toString() + props.id.toString()}
                        >
                          <div className="col-1">{index + 1}</div>

                          <div className="col-3">
                            <img
                              src={show.image}
                              className="img-fluid rounded-start"
                              alt="..."
                            />
                          </div>
                          <div className="col-6">{show.name}</div>
                        </a>
                      </div>
                      <div className="col-2">
                        <button className="btn p-0 ">
                          <i className="bi bi-trash-fill"></i>
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
        className="modal fade"
        id={"addModal" + currentList.id.toString()}
        tabIndex={-1}
        aria-labelledby="authModal"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div className="modal-content pb-3">
            <div className="modal-header">
              <div className="modal-title d-flex justify-content-between align-items-center w-100">
                <h4>{currentList.title}</h4>

                <div className="d-flex justify-content-between">
                  <span>
                    <button className="btn p-0">
                      <i className="bi bi-heart-fill"></i>{" "}
                    </button>
                    {currentList.followCnt}{" "}
                  </span>
                  <span>
                    By{" "}
                    <a
                      className="text-dark"
                      href={"/watchlist?user=@" + currentList.user.handle}
                    >
                      @{currentList.user.handle}
                    </a>
                  </span>
                </div>
              </div>
              <button
                type="button"
                className="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div className="modal-body">
              <div className="list-group">
                {shows.map((show, index) => (
                  <>
                    <div className="d-flex align-items-center">
                      <div className="col-10">
                        <a
                          href="#"
                          className="list-group-item border-0 list-group-item-action d-flex align-items-center"
                          key={index.toString() + props.id.toString()}
                        >
                          <div className="col-1">{index + 1}</div>

                          <div className="col-3">
                            <img
                              src={show.image}
                              className="img-fluid rounded-start"
                              alt="..."
                            />
                          </div>
                          <div className="col-6">{show.name}</div>
                        </a>
                      </div>
                      <div className="col-2">
                        <button
                          className="btn p-0 "
                          data-bs-dismiss="modal"
                          aria-label="Close"
                        >
                          <i className="bi bi-plus-lg"></i>
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
    </>
  );
}

export default IndList;
