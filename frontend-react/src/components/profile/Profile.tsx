import IndList from "../watchlist/IndList";

interface Props {}

function Profile(props: Props): JSX.Element {
  return (
    <>
      <div className=" d-flex  justify-content-around p-3  profilegrid ">
        <div className="w-50 d-flex col-6 flex-column border border-2 border-dark rounded">
          <div className="d-flex  p-3 bg-light  ">
            <div className="  col-2 m-3 ">Name:</div>
            <div className="    m-3 ">Sarwar Khalid</div>
          </div>
          
          <div className="d-flex  p-3 bg-light  ">
            <div className="  col-2 m-3 ">Handle:</div>
            <div className="    m-3 ">sarwar450</div>
          </div>

          <div className="d-flex  p-3   ">
            <div className="  col-2 m-3 ">Email:</div>
            <div className="    m-3 ">sarwar@gmail.com</div>
          </div>

          <div className="d-flex  p-3 bg-light  ">
            <div className="  col-2 m-3 ">Joined at:</div>
            <div className="    m-3 ">09-02-2000</div>
          </div>
        </div>

        <div className="m-auto col-6 ps-3 d-flex flex-column justify-content-center">
          <div className=" border border-5 border-dark rounded dp">
            <img src={require("../../geralt.jpg").default} />
          </div>

          <div className="d-flex  p-3 ">
            Geralt is a witcher. Shortly after his birth, Geralt's mother,
            Visenna, gave him away to undergo training and he stronghold of e
            became a master sword fighter lls used by the witchers.
          </div>
        </div>
      </div>

      <div className="d-flex">
        <button
          className="btn"
          data-bs-toggle="modal"
          data-bs-target="#requestShow"
        >
          <i className="bi bi-tv"></i> Request Show{" "}
        </button>
        <button
          className="btn"
          data-bs-toggle="modal"
          data-bs-target="#AddList"
        >
          {" "}
          <i className="bi bi-list"></i> Add List{" "}
        </button>
      </div>

      <div className="d-flex flex-column">
        <h5 className="text-start">@sarwar450 's Lists</h5>
        <div className="d-flex">
          <IndList id={69} />
          <IndList id={69} />
          <IndList id={69} />
          <IndList id={69} />
        </div>
      </div>

      <div className="d-flex flex-column pb-5">
        <h5 className="text-start">@sarwar450 's Follows</h5>
        <div className="d-flex">
          <IndList id={69} />
          <IndList id={69} />
          <IndList id={69} />
          <IndList id={69} />
        </div>
      </div>

      <div
        className="modal fade"
        id={"requestShow"}
        tabIndex={-1}
        aria-labelledby="authModal"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div className="modal-content pb-3">
            <div className="modal-header">
              <div className="modal-title d-flex justify-content-between align-items-center w-100">
                <h4>Add Show</h4>

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
                <input
                  type="text"
                  className="form-control"
                  placeholder="Tittle"
                />
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
        id={"AddList"}
        tabIndex={-1}
        aria-labelledby="authModal"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div className="modal-content pb-3">
            <div className="modal-header">
              <div className="modal-title d-flex justify-content-between align-items-center w-100">
                <h4>Add List</h4>

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
                <input
                  type="text"
                  className="form-control"
                  placeholder="Tittle"
                />
                <button className="btn" type="submit">
                  {" "}
                  Submit
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </>
  );
}

export default Profile;
