interface Props {
  type: number;
}

// Will have users list
// Can approve shows
// Show approved but not released sows

function AdminShowList(props: Props): JSX.Element {
  let showi = {
    id: 134324,
    image: require("../../images/img1.jpg").default,
    rating: 4.5,
    title: "Code Geass",
    release_date: "01/10/1312",
  };

  let shows = [showi];

  const handleApprove = (show) => {
    const entered = prompt('Please enter your yes if you want to keep change?')
    
  }

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
      </div>
      <table className="table">
        <thead>
          <tr>
            <th scope="col"> # </th>
            <th scope="col">Name</th>
            <th scope="col">Approve</th>
          </tr>
        </thead>
        <tbody>
          {shows.map((show, index) => {
            return (
              <tr>
                <td>{index + 1}</td>
                <td>
                  <a
                    className="text-decoration-none link-secondary"
                    href="./show?id=${dat.id}"
                  >
                    <h5>{show.title}</h5>
                  </a>
                </td>
                <td>
                  <div className="form-check form-check d-flex justify-content-center">
                    <input
                      className="form-check-input"
                      type="checkbox"
                      value=""
                      defaultChecked={false}
                      onChange={()=>handleApprove(show)}
                      id="flexCheckDefault"
                    />
                  </div>
                </td>
              </tr>
            );
          })}
        </tbody>
      </table>
    </>
  );
}

export default AdminShowList;
