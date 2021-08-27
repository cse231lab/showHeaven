import { useState } from "react";
import { Redirect, useHistory, useLocation } from "react-router-dom";
import { Path } from "../../util/constants";
import Pagination from "../shared/Pagination";
import IndList from "./IndList";

interface Props {}

function WatchList(props: Props): JSX.Element {
  let indList = {};

  let arr = [];

  for (let i = 0; i < 20; i++) {
    arr.push(i);
  }

  let query = new URLSearchParams(useLocation().search);

  const [formData, setFormData] = useState({
    search: query.get("search") ? query.get("search") : "",
    user: query.get("user") ? query.get("user") : "",
    page: query.get("page") ? parseInt(query.get("page")) : 1,
  });

  let history = useHistory();

  const go = (page = 1) => {
    history.push(
      Path.WATCHLIST +
        "?search=" +
        formData.search +
        "&user=" +
        formData.user +
        "&page=" +
        page
    );
  };

  return (
    <>
      <form
        onSubmit={(e) => {
          e.preventDefault();
          go();
        }}
        className="d-flex justify-content-between pb-3 pt-3"
      >
        <div className="col-7">
          <div className="input-group">
            <label htmlFor="searchField" className="input-group-text">
              Search
            </label>
            <input
              className="form-control"
              placeholder="Type to search..."
              value={formData.search}
              onChange={(e) =>
                setFormData({ ...formData, search: e.target.value })
              }
            />
          </div>
        </div>

        <button className="btn" type="submit">
          <i className="bi bi-search"></i>
        </button>

        <div className="col-4">
          <div className="input-group">
            <label htmlFor="searchField" className="input-group-text">
              User
            </label>
            <input
              className="form-control"
              placeholder="Keep empty for any"
              value={formData.user}
              onChange={(e) =>
                setFormData({ ...formData, user: e.target.value })
              }
            />
          </div>
        </div>
      </form>

      <div className="list row flex-wrap">
        {arr.map((id) => (
          <IndList id={id} key={id} />
        ))}
      </div>

      <Pagination current={formData.page} total={100} onChange={(e) => go(e)} />
    </>
  );
}

export default WatchList;
