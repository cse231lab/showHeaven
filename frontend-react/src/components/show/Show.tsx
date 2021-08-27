interface Props {}

function Show(props: Props): JSX.Element {
  return (
    <>
      <div className="p-3 d-flex flex-column m-auto shadow-lg bg-light border border-2 border-light  align-items-center rounded m-3 justify-content-around show">
        <div className="d-flex flex-column justify-content-start align-self-stretch align-items-start me-3 flex-grow-1 ">
          <h1 className="align-self-center m-2">
            THE WITCHER{" "}
            <button
              className="btn"
              data-bs-toggle="modal"
              data-bs-target="#editShow"
            >
              {" "}
              <i className="bi bi-pencil-square"></i> Edit{" "}
            </button>
          </h1>

          <h6 className="align-self-center mb-4">
            Genre: Drama,Fantasy,Action Fiction, Adventure Fiction, Fantasy
            Television{" "}
          </h6>

          <div className="mb-4 d-flex justify-content-center align-items-center align-self-center border border-4 border-dark rounded shadow-lg">
            <img
              src={require("../../images/witcher_poster.jpg").default}
              className="dp"
            />
          </div>

          <div
            className="accordion d-flex flex-column   align-self-stretch "
            id="accordionExample"
          >
            <div className="accordion-item  ">
              <h2 className="accordion-header  " id="headingOne">
                <button
                  className="accordion-button bg-dark bg-gradient text-white fs-4  "
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseOne"
                  aria-expanded="true"
                  aria-controls="collapseOne"
                >
                  Description
                </button>
              </h2>

              <div
                id="collapseOne"
                className="accordion-collapse collapse show"
                aria-labelledby="headingOne"
              >
                <div className="accordion-body text-start">
                  <div>
                    The Witcher is a Polish-American fantasy drama streaming
                    television series created by Lauren Schmidt Hissrich, based
                    on the book series of the same name by Polish writer Andrzej
                    Sapkowski. Set on a fictional, medieval-inspired landmass
                    known as "the Continent", The Witcher explores the legend of
                    Geralt of Rivia and Princess Ciri, who are linked to each
                    other by destiny.[8] It stars Henry Cavill, Freya Allan and
                    Anya Chalotra. The first season consisted of eight episodes
                    and was released on Netflix in its entirety on December 20,
                    2019. It was based on The Last Wish and Sword of Destiny,
                    which are collections of short stories that precede the main
                    Witcher saga. The second season, consisting of eight
                    episodes, is scheduled to be released on December 17,
                    2021.[9][10] Geralt of Rivia, a solitary monster hunter,
                    struggles to find his place in a world where people often
                    prove more wicked than beasts.
                  </div>
                  <div className="d-flex flex-column pt-5">
                    <span>Rating : 9.8</span>
                    <span>Release : 21/21/1212</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div
            className="accordion d-flex flex-column mt-1  align-self-stretch "
            id="accordionExample"
          >
            <div className="accordion-item  ">
              <h2 className="accordion-header   " id="headingTwo">
                <button
                  className="accordion-button bg-dark bg-gradient text-white fs-4  "
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseTwo"
                  aria-expanded="true"
                  aria-controls="collapseTwo"
                >
                  Seasons
                </button>
              </h2>

              <div
                id="collapseTwo"
                className="accordion-collapse collapse show"
                aria-labelledby="headingTwo"
              >
                <div className="accordion-body text-start">
                  <div
                    className="accordion d-flex flex-column   align-self-stretch "
                    id="accordionExample"
                  >
                    <div className="accordion-item  ">
                      <h2 className="accordion-header   " id="seasonOne">
                        <button
                          className="accordion-button bg-light bg-gradient text-dark border border-2 border-dark rounded fs-4  "
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#collapseseasonOne"
                          aria-expanded="true"
                          aria-controls="collapseseasonOne"
                        >
                          Season 1{" "}
                          <button
                            className="btn"
                            data-bs-toggle="modal"
                            data-bs-target="#editSeason"
                          >
                            {" "}
                            <i className="bi bi-pencil-square"></i> Edit{" "}
                          </button>
                        </button>
                      </h2>

                      <div
                        id="collapseseasonOne"
                        className="accordion-collapse collapse show"
                        aria-labelledby="seasonOne"
                      >
                        <div className="accordion-body text-start">
                          <div className="  h6 d-flex flex-column flex-grow-1">
                            Episode 1: "The End's Beginning"
                          </div>

                          <div className=" h6 d-flex flex-column flex-grow-1 mt-2">
                            Episode 2: "Four Marks"
                          </div>

                          <div className=" h6 d-flex flex-column flex-grow-1 mt-2">
                            Episode 3: "Betrayer Moon"
                          </div>

                          <div className=" h6 d-flex flex-column flex-grow-1 mt-2">
                            Episode 4: "Of Banquets, Bastards and Burials"
                          </div>

                          <div className=" h6 d-flex flex-column flex-grow-1 mt-2">
                            Episode 5: "Bottled Appetites"
                          </div>

                          <div className=" h6 d-flex flex-column flex-grow-1 mt-2">
                            Episode 6: "Rare Species"
                          </div>

                          <div className=" h6 d-flex flex-column flex-grow-1 mt-2">
                            Episode 7: "Before a Fall"
                          </div>

                          <div className=" h6 d-flex flex-column flex-grow-1 mt-2">
                            Episode 8: "Much More"
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div
                    className="accordion d-flex flex-column   align-self-stretch "
                    id="accordionExample"
                  >
                    <div className="accordion-item  ">
                      <h2 className="accordion-header   " id="seasonTwo">
                        <button
                          className="accordion-button bg-light bg-gradient text-dark border border-2 border-dark rounded fs-4   "
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#collapseseasonTwo"
                          aria-expanded="true"
                          aria-controls="collapseseasonTwo"
                        >
                          Season 2
                          <button
                            className="btn"
                            data-bs-toggle="modal"
                            data-bs-target="#editSeason"
                          >
                            {" "}
                            <i className="bi bi-pencil-square"></i> Edit{" "}
                          </button>
                        </button>
                      </h2>

                      <div
                        id="collapseseasonTwo"
                        className="accordion-collapse collapse show"
                        aria-labelledby="seasonTwo"
                      >
                        <div className="accordion-body text-start"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div
            className="accordion d-flex flex-column mt-1  align-self-stretch "
            id="accordionExample"
          >
            <div className="accordion-item  ">
              <h2 className="accordion-header   " id="headingTwo">
                <button
                  className="accordion-button bg-dark bg-gradient text-white fs-4  "
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapsecast"
                  aria-expanded="true"
                  aria-controls="collapseTwo"
                >
                  Cast
                </button>
              </h2>

              <div
                id="collapsecast"
                className="accordion-collapse collapse show"
                aria-labelledby="headingTwo"
              >
                <div className="accordion-body row text-start">
                  <div className="col-3 mb-1 me-1">
                    <div className="card">
                      <img
                        className="w-100"
                        src={require("../../geralt.jpg").default}
                      />
                      <div className="card-body">
                        <h5 className="card-title">Geralt</h5>
                        <p className="card-text">Name</p>
                      </div>
                    </div>
                  </div>
                  <div className="col-3 mb-1 me-1">
                    <div className="card">
                      <img
                        className="w-100"
                        src={require("../../geralt.jpg").default}
                      />
                      <div className="card-body">
                        <h5 className="card-title">Geralt</h5>
                        <p className="card-text">Name</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div
            className="accordion d-flex flex-column  mt-1 align-self-stretch "
            id="accordionExample"
          >
            <div className="accordion-item  ">
              <h2 className="accordion-header   " id="headingThree">
                <button
                  className="accordion-button bg-dark bg-gradient text-white fs-4  "
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseThree"
                  aria-expanded="true"
                  aria-controls="collapseThree"
                >
                  Reviews
                </button>
              </h2>

              <div
                id="collapseThree"
                className="accordion-collapse collapse show"
                aria-labelledby="headingThree"
              >
                <div className="accordion-body text-start">
                  <button
                    className="btn"
                    data-bs-toggle="modal"
                    data-bs-target="#editComment"
                  >
                    {" "}
                    <i className="bi bi-pencil-square"></i> Add Comment{" "}
                  </button>
                  <div className="card">
                    <div className="row">
                      <div className="col-2">
                        <div className="d-flex flex-column">
                          <img
                            className="w-100"
                            src={require("../../geralt.jpg").default}
                          />
                          <span> Geralt</span>
                        </div>
                      </div>
                      <div className="card-body col-10">
                        <div className="d-flex justify-content-between align-items-center">
                          <h5 className="card-title">Rating: 9.8</h5>
                          <h6 className="card-subtitle text-end mb-2 text-muted">
                            10 min ago
                          </h6>
                        </div>
                        <p className="card-text">
                          Some quick example text to build on the card title and
                          make up the bulk of the card's content.
                        </p>
                        <button
                          className="btn"
                          data-bs-toggle="modal"
                          data-bs-target="#editComment"
                        >
                          {" "}
                          <i className="bi bi-pencil-square"></i> Edit{" "}
                        </button>
                        <button
                          className="btn"
                          data-bs-toggle="modal"
                          data-bs-target="#makecomment"
                        >
                          {" "}
                          <i className="bi bi-reply"></i> Reply{" "}
                        </button>
                      </div>
                    </div>
                  </div>
                  <div className="card ms-5">
                    <div className="row">
                      <div className="col-2">
                        <div className="d-flex flex-column">
                          <img
                            className="w-100"
                            src={require("../../geralt.jpg").default}
                          />
                          <span> Geralt</span>
                        </div>
                      </div>
                      <div className="card-body col-10">
                        <div className="d-flex justify-content-between align-items-center">
                          <h5 className="card-title">Replying @Geralt</h5>
                          <h6 className="card-subtitle text-end mb-2 text-muted">
                            10 min ago
                          </h6>
                        </div>
                        <p className="card-text">
                          Some quick example text to build on the card title and
                          make up the bulk of the card's content.
                        </p>
                        <button
                          className="btn"
                          data-bs-toggle="modal"
                          data-bs-target="#editComment"
                        >
                          {" "}
                          <i className="bi bi-pencil-square"></i> Edit{" "}
                        </button>
                        <button
                          className="btn"
                          data-bs-toggle="modal"
                          data-bs-target="#makecomment"
                        >
                          {" "}
                          <i className="bi bi-reply"></i> Reply{" "}
                        </button>
                      </div>
                    </div>
                  </div>
                  <div className="card">
                    <div className="row">
                      <div className="col-2">
                        <div className="d-flex flex-column">
                          <img
                            className="w-100"
                            src={require("../../geralt.jpg").default}
                          />
                          <span> Geralt</span>
                        </div>
                      </div>
                      <div className="card-body col-10">
                        <div className="align-items-center">
                          <h6 className="card-subtitle text-end mb-2 text-muted">
                            10 min ago
                          </h6>
                        </div>
                        <p className="card-text">
                          Some quick example text to build on the card title and
                          make up the bulk of the card's content.
                        </p>
                        <button
                          className="btn"
                          data-bs-toggle="modal"
                          data-bs-target="#editComment"
                        >
                          {" "}
                          <i className="bi bi-pencil-square"></i> Edit{" "}
                        </button>
                        <button
                          className="btn"
                          data-bs-toggle="modal"
                          data-bs-target="#makecomment"
                        >
                          {" "}
                          <i className="bi bi-reply"></i> Reply{" "}
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div
        className="modal fade"
        id={"makecomment"}
        tabIndex={-1}
        aria-labelledby="authModal"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
          <div className="modal-content pb-3">
            <form action="">
              <div className="mb-3">
                <label className="form-label">Comment</label>
                <textarea className="form-control" value={``}></textarea>
              </div>
              <button className="btn" type="submit">
                {" "}
                Submit
              </button>
            </form>
          </div>
        </div>
      </div>

      <div
        className="modal fade"
        id={"editComment"}
        tabIndex={-1}
        aria-labelledby="authModal"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
          <div className="modal-content pb-3">
            <form action="">
              <div className="input-group mb-3">
                <span className="input-group-text">Rating </span>
                <input
                  type="number"
                  className="form-control"
                  placeholder="0.0"
                  value="Season 1"
                />
              </div>
              <div className="mb-3">
                <label className="form-label">Comment</label>
                <textarea className="form-control" value={``}></textarea>
              </div>
              <button className="btn" type="submit">
                {" "}
                Submit
              </button>
            </form>
          </div>
        </div>
      </div>

      <div
        className="modal fade"
        id={"editShow"}
        tabIndex={-1}
        aria-labelledby="authModal"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
          <div className="modal-content pb-3">
            <div className="modal-header">
              <div className="modal-title d-flex justify-content-between align-items-center w-100">
                <h4>Edit Show</h4>

                <button
                  type="button"
                  className="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
            </div>
            <div className="modal-body">
              <form action="">
                <div className="input-group mb-3">
                  <span className="input-group-text">Title </span>
                  <input
                    type="text"
                    className="form-control"
                    placeholder="Name"
                    value="THE WITCHER"
                  />
                </div>
                <div className="input-group mb-3">
                  <span className="input-group-text">Tags</span>
                  <input
                    type="text"
                    className="form-control"
                    value="Drama,Fantasy,Action Fiction, Adventure Fiction, Fantasy Television"
                  />
                </div>
                <div className="mb-3">
                  <label className="form-label">Description</label>
                  <textarea
                    className="form-control"
                    value={`The Witcher is a Polish-American fantasy drama streaming television series created by Lauren Schmidt Hissrich, based on the book series of the same name by Polish writer Andrzej Sapkowski. Set on a fictional, medieval-inspired landmass known as "the Continent", The Witcher explores the legend of Geralt of Rivia and Princess Ciri, who are linked to each other by destiny.[8] It stars Henry Cavill, Freya Allan and Anya Chalotra. The first season consisted of eight episodes and was released on Netflix in its entirety on December 20, 2019. It was based on The Last Wish and Sword of Destiny, which are collections of short stories that precede the main Witcher saga. The second season, consisting of eight episodes, is scheduled to be released on December 17, 2021.[9][10] Geralt of Rivia, a solitary monster hunter, struggles to find his place in a world where people often prove more wicked than beasts.`}
                  ></textarea>
                </div>
                <div className="mb-3">
                  <label className="form-label">Image</label>
                  <input className="form-control" type="file" id="formFile" />
                </div>
                <button className="btn" type="submit">
                  {" "}
                  Submit
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div
        className="modal fade"
        id={"editSeason"}
        tabIndex={-1}
        aria-labelledby="editSeason"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
          <div className="modal-content pb-3">
            <div className="modal-header">
              <div className="modal-title d-flex justify-content-between align-items-center w-100">
                <h4>
                  Edit Season{" "}
                  <button className="btn p-0 ">
                    <i className="bi bi-trash-fill"></i>
                  </button>
                </h4>

                <button
                  type="button"
                  className="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
            </div>
            <div className="modal-body">
              <form action="">
                <div className="input-group mb-3">
                  <span className="input-group-text">Title </span>
                  <input
                    type="text"
                    className="form-control"
                    placeholder="Name"
                    value="Season 1"
                  />
                </div>

                <h5>Episodes</h5>

                <div className="  h6 d-flex flex-grow-1">
                  <div className="col-10">
                    <input
                      type="text"
                      className="form-control"
                      placeholder="Name"
                      value={`Episode 1: "The End's Beginning"`}
                    />
                  </div>
                  <div className="col-2">
                    <button className="btn p-0 ">
                      <i className="bi bi-trash-fill"></i>
                    </button>
                  </div>
                </div>
                <div className="  h6 d-flex flex-grow-1">
                  <div className="col-10">
                    <input
                      type="text"
                      className="form-control"
                      placeholder="Name"
                      value={`Episode 2: "Four Marks"`}
                    />
                  </div>
                  <div className="col-2">
                    <button className="btn p-0 ">
                      <i className="bi bi-trash-fill"></i>
                    </button>
                  </div>
                </div>
                <div className="  h6 d-flex flex-grow-1">
                  <div className="col-10">
                    <input
                      type="text"
                      className="form-control"
                      placeholder="Name"
                      value={`Episode 3: "Betrayer Moon"`}
                    />
                  </div>
                  <div className="col-2">
                    <button className="btn p-0 ">
                      <i className="bi bi-trash-fill"></i>
                    </button>
                  </div>
                </div>

                <button className="btn btn-secondary mb-2" type="submit">
                  {" "}
                  Submit
                </button>
              </form>

              <h5>Add</h5>

              <form action="">
                <div className="d-flex">
                  <div className="col-7">
                    <div className="input-group mb-3">
                      <span className="input-group-text">Name </span>
                      <input
                        type="text"
                        className="form-control"
                        placeholder="Name"
                        value="Season 1"
                      />
                    </div>
                  </div>
                  <div className="col-5">
                    <button className="btn" type="submit">
                      {" "}
                      Add Episode <i className="bi bi-plus"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </>
  );
}

export default Show;
