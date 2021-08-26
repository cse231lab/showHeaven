import { Link } from "react-router-dom";
import { Path } from "../../util/constants";
import Sign from "../auth/Sign";

interface Props {}

function Menu(props: Props): JSX.Element {
  return (
    <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
      <div className="container">
        <Link to={Path.HOME} className="navbar-brand" href="./">
          ShowHeaven
        </Link>
        <button
          className="navbar-toggler"
          data-bs-toggle="collapse"
          data-bs-target="#mainnavbar"
        >
          <span className="navbar-toggler-icon"></span>
        </button>

        <div className="collapse navbar-collapse" id="mainnavbar">
          <ul className="navbar-nav ms-auto pe-5">
            <li className="nav-item">
              <Link to={Path.SHOWLIST} className="nav-link" href="#">
                Show List
              </Link>
            </li>
            <li className="nav-item">
              <Link to={Path.SHOW} className="nav-link" href="#">
                Show
              </Link>
            </li>
            <li className="nav-item">
              <Link to={Path.PROFILE} className="nav-link" href="#">
                Profile
              </Link>
            </li>
            <li className="nav-item">
              <Link to={Path.ADMIN} className="nav-link" href="#">
                Admin
              </Link>
            </li>
            <li className="nav-item">
              <Link to={Path.WATCHLIST} className="nav-link" href="#">
                list
              </Link>
            </li>
            <li className="nav-item">
              <Link to={Path.FORGOT} className="nav-link" href="#">
                Forgot
              </Link>
            </li>
            <li className="nav-item dropdown ">
              <a
                className="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
              >
                <i className="bi bi-person-circle"></i>
              </a>
              <ul
                className="dropdown-menu dropdown-menu-dark"
                aria-labelledby="navbarDropdown"
              >
                <li>
                  <a className="dropdown-item" href="#">
                    <button
                      type="button"
                      className="btn text-light ps-0"
                      data-bs-toggle="modal"
                      data-bs-target="#exampleModal"
                    >
                      Sign in/up
                    </button>
                  </a>
                </li>
                <li>
                  <a className="dropdown-item" href="#">
                    Profile
                  </a>
                </li>
                <li>
                  <a className="dropdown-item" href="#">
                    Lists
                  </a>
                </li>
                <li>
                  <hr className="dropdown-divider" />
                </li>
                <li>
                  <a className="dropdown-item" href="#">
                    Sign Out <i className="bi bi-box-arrow-right"></i>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <Sign />
    </nav>
  );
}

export default Menu;
