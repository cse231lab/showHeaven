import { useState } from "react";
import { useHistory, useLocation } from "react-router-dom";
import Select from "react-select";
import { Path } from "../../util/constants";
import Pagination from "../shared/Pagination";
interface Props {}

function ShowList(props: Props): JSX.Element {
  let obj = {
    id: 134324,
    image: require("../../images/img1.jpg").default,
    rating: 4.5,
    title: "Code Geass",
    release_date: "01/10/1312",
  };

  let data = [obj];

  let tags = [
    { value: "Action", label: "Action" },
    { value: "Anime", label: "Anime" },
    { value: "Adventure", label: "Adventure" },
  ];

  for (let i = 0; i < 10; i++) {
    data.push(obj);
  }

  let query = new URLSearchParams(useLocation().search);

  const tagsSelected = (query1) => {
    let ans = [];

    let arr = query1.get("tags");
    if (arr) {
      arr = arr.split(",");

      for (let tag of tags) {
        ans.push({ value: tag, label: tag });
      }
    }

    return ans;
  };

  const [formData, setFormData] = useState({
    search: query.get("search") ? query.get("search") : "",
    sort: query.get("sort") ? query.get("sort") : "",
    tags: tagsSelected(query),
    page: query.get("page") ? parseInt(query.get("page")) : 1,
  });

  let history = useHistory();
  const go = (page = 1) => {
    let querated = "";
    for (let i = 0; i < formData.tags.length; i++) {
      if (i != 0) querated += ",";
      querated += formData.tags[i].value;
    }

    history.push(
      Path.SHOWLIST +
        "?search=" +
        formData.search +
        "&sort=" +
        formData.sort +
        "&tags=" +
        querated +
        "&page" +
        page
    );
  };

  return (
    <>
      <div>
        <form
          onSubmit={(e) => {
            e.preventDefault();
            go();
          }}
          className="d-flex justify-content-between p-3"
        >
          <div className="col-5 d-flex">
            <div className="input-group">
              <label htmlFor="searchField" className="input-group-text">
                Search
              </label>
              <input
                className="form-control"
                id="searchField"
                value={formData.search}
                onChange={(e) =>
                  setFormData({ ...formData, search: e.target.value })
                }
                placeholder="Type to search..."
              />
            </div>

            <button className="btn" type="submit">
              <i className="bi bi-search"></i>
            </button>
          </div>

          <div className="col-2">
            <div className="input-group">
              <label className="input-group-text" htmlFor="inputGroupSelect01">
                Sort By
              </label>
              <select
                className="form-select"
                id="inputGroupSelect01"
                onChange={(e) => {
                  setFormData({ ...formData, sort: e.target.value });
                }}
              >
                <option value="title">Tittle</option>
                <option value="release">Release</option>
                <option value="rating">Rating</option>
              </select>
            </div>
          </div>

          <div className="col-4">
            <Select
              closeMenuOnSelect={false}
              // defaultValue={[tags[0], tags[1]]}
              onChange={(e) => {
                setFormData({ ...formData, tags: e });
              }}
              isMulti={true}
              options={tags}
            />
          </div>
        </form>
      </div>
      <table className="table">
        <thead>
          <tr>
            <th scope="col"> </th>
            <th scope="col">Title</th>
            <th scope="col">Rating</th>
            <th scope="col">Release Date</th>
            <th scope="col">ADD</th>
          </tr>
        </thead>
        <tbody>
          {data.map((show, index) => {
            return (
              <tr >
                <td className="col-3 col-md-2 col-lg-1">
                  <img
                    src={show.image}
                    className="img-fluid rounded-start"
                    alt="..."
                  />
                </td>
                <td>
                  <a
                    className="text-decoration-none ps-5 d-flex align-items-center  link-secondary"
                    href={Path.SHOW + "?id=" + show.id}
                  >
                    <h6 >{show.title}</h6>
                  </a>
                </td>
                <td>{show.rating}</td>
                <td>{show.release_date}</td>
                <td>
                  <button className="text-decoration-none btn link-secondary">
                    <h5>
                      <i className="bi bi-file-plus"></i>
                    </h5>
                  </button>
                </td>
              </tr>
            );
          })}
        </tbody>
      </table>

      <Pagination current={formData.page} total={100} onChange={(e) => go(e)} />
    </>
  );
}

export default ShowList;
