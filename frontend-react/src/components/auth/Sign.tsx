interface Props {}

function Sign(props: Props): JSX.Element {
  return (
    <>
      <div
        className="modal fade"
        id="exampleModal"
        tabIndex={-1}
        aria-labelledby="authModal"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
          <div className="modal-content pb-3">
            <div className="modal-header">
              <h4 className="modal-title" id="authModal">
                Authentication <i className="bi bi-shield-lock-fill"></i>
              </h4>
              <button
                type="button"
                className="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div className="modal-body">
              <div className="d-flex">
                <div className="col-6 pe-2 border-end d-flex flex-column">
                  <h5 className="border-bottom border-2 pb-1">Sign In</h5>
                  <form action="">
                    <div className="input-group mb-3">
                      <span className="input-group-text">
                        handle/email
                      </span>
                      <input
                        type="text"
                        className="form-control"
                        placeholder="Username"
                        aria-label="Username"
                        aria-describedby="basic-addon1"
                      />
                    </div>

                    <div className="input-group mb-3">
                      <span className="input-group-text">Password</span>
                      <input type="password" className="form-control" />
                    </div>

                    <div className="valid-feedback">Looks good!</div>
                    <button className="btn" type="submit">
                      Forgot Password
                    </button>


                    <button className="btn btn-secondary" type="submit">
                      Sign In
                    </button>
                  </form>
                </div>
                <div className="col-6 ps-2">
                  <h5 className="border-bottom border-2 pb-1">Sign Up</h5>
                  <form action="">
									<div className="input-group mb-3">
                      <span className="input-group-text">
                        Name
                      </span>
                      <input
                        type="text"
                        className="form-control"
                        placeholder="Username"
                        aria-label="Username"
                        aria-describedby="basic-addon1"
                      />
                    </div>
                    <div className="input-group mb-3">
                      <span className="input-group-text">
                        handle
                      </span>
                      <input
                        type="text"
                        className="form-control"
                        placeholder="Username"
                        aria-label="Username"
                        aria-describedby="basic-addon1"
                      />
                    </div>

										<div className="input-group mb-3">
                      <span className="input-group-text">
                        email
                      </span>
                      <input
                        type="email"
                        className="form-control"
                        placeholder="Username"
                        aria-label="Username"
                        aria-describedby="basic-addon1"
                      />
                    </div>

                    <div className="input-group mb-3">
                      <span className="input-group-text">Password</span>
                      <input type="password" className="form-control" />
                    </div>

                    
                    <div className="valid-feedback">Looks good!</div>
                    <button className="btn btn-secondary" type="submit">
                      Sign Up
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
}

export default Sign;
