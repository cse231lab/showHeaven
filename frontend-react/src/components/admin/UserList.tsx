import Select from "react-select";
import makeAnimated from "react-select/animated";

interface Props {}

// Will have users list
// Can approve shows
// Show approved but not released sows

function UserList(props: Props): JSX.Element {
  let users = [
    {
      id: 5,
      name: "Jjj",
      handle: "sdsss",
      type: 0,
    },
  ];

  let types = [
    { value: 0, label: "General" },
    { value: 1, label: "Moderator" },
    { value: 2, label: "Admin" },
  ];

  const animatedComponents = makeAnimated();

  const handleModerator = (user) => {
    const entered = prompt("Please enter your yes if you want to keep change?");
  };

  const handleAdmin = (user) => {
    const entered = prompt("Please enter your yes if you want to keep change?");
  };

  return (
    <>
      <div className="d-flex justify-content-between p-3">
        <form action="" className="col-5 d-flex">
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

          <button className="btn" role="submit">
            <i className="bi bi-search"></i>
          </button>
        </form>

        <div className="col-4">
          <Select
            closeMenuOnSelect={false}
            components={animatedComponents}
            // defaultValue={[tags[0], tags[1]]}
            isMulti={true}
            options={types}
          />
        </div>
      </div>
      <table className="table">
        <thead>
          <tr>
            <th scope="col"> # </th>
            <th scope="col">handle</th>
            <th scope="col">Name</th>
            <th scope="col">Is Moderator</th>
            <th scope="col">Is Admin</th>
            <th scope="col">Delete</th>
            
          </tr>
        </thead>
        <tbody>
          {users.map((user, index) => {
            return (
              <tr>
                <td>{index + 1}</td>
                <td>
                  <a
                    className="text-decoration-none link-secondary"
                    href="./show?id=${dat.id}"
                  >
                    <h5>{user.handle}</h5>
                  </a>
                </td>
                <td>{user.name}</td>
                <td>
                  <div className="form-check form-check d-flex justify-content-center">
                    <input
                      className="form-check-input"
                      type="checkbox"
                      value=""
                      defaultChecked={user.type === 1}
                      onChange={() => handleModerator(user)}
                      id="flexCheckDefault"
                    />
                  </div>
                </td>
                <td>
                  <div className="form-check form-check d-flex justify-content-center">
                    <input
                      className="form-check-input"
                      type="checkbox"
                      value=""
                      defaultChecked={user.type === 2}
                      onChange={() => handleAdmin(user)}
                      id="flexCheckDefault"
                    />
                  </div>
                </td>
                <td>
                  <button className="btn">
                    <i className="bi bi-trash-fill"></i>
                  </button>
                </td>
              </tr>
            );
          })}
        </tbody>
      </table>
    </>
  );
}

export default UserList;
