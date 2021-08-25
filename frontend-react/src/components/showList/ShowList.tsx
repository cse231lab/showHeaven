import Select from "react-select";
import makeAnimated from "react-select/animated";
interface Props {}

function ShowList(props: Props): JSX.Element {
  let obj = {
    id: 134324,
    image: require("../../images/img1.jpg").default,
    rating: 4.5,
    title: "Code Geass",
    release_date: "01/10/1312",
  };

  const animatedComponents = makeAnimated();
  let data = [obj];

  let tags = [
    { value: "Action", label: "Action" },
    { value: "Anime", label: "Anime" },
    { value: "Adventure", label: "Adventure" },
  ];

  for (let i = 0; i < 10; i++) {
    data.push(obj);
  }

  return (
    <>
      <div className="container">
        <div className="d-flex justify-content-between p-3">
          <form action="" className="col-5">
            <div className="input-group">
              <label htmlFor="searchField" className="input-group-text">
                Search
              </label>
              <input
                className="form-control"
                id="searchField"
                placeholder="Type to search..."
              />
            </div>
          </form>

          <div className="col-2">
            <div className="input-group">
              <label className="input-group-text" htmlFor="inputGroupSelect01">
                Sort By
              </label>
              <select className="form-select" id="inputGroupSelect01">
                <option value="title">Tittle</option>
                <option value="release">Release</option>
                <option value="rating">Rating</option>
              </select>
            </div>
          </div>

          <div className="col-4">
            <Select
              closeMenuOnSelect={false}
              components={animatedComponents}
              // defaultValue={[tags[0], tags[1]]}
              isMulti={true}
              options={tags}
            />
          </div>
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
            {data.map((show) => {
              return (
                <tr>
                  <td className="col-3 col-md-2 col-lg-1">
                    <img
                      src={show.image}
                      className="img-fluid rounded-start"
                      alt="..."
                    />
                  </td>
                  <td>
                    <a
                      className="text-decoration-none link-secondary"
                      href="./show?id=${dat.id}"
                    >
                      <h5>{show.title}</h5>
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
      </div>
    </>
  );
}

export default ShowList;
