import AdminShowList from "./AdminShowList";
import UserList from "./UserList";

interface Props {}

// Will have users list
// Can approve shows
// Show approved but not released shows
//

function Admin(props: Props): JSX.Element {
  return (
    <>
      <div className="pt-5 pb-5">
        <div className="d-flex">
          <button
            className="btn btn-secondary rounded-0"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#userc"
            aria-expanded="false"
            aria-controls="userc"
          >
            UserList
          </button>
          <button
            className="btn btn-secondary rounded-0"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#showc"
            aria-expanded="false"
            aria-controls="showc"
          >
            Non public show list
          </button>
          <button
            className="btn btn-secondary rounded-0"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#showapp"
            aria-expanded="false"
            aria-controls="showapp"
          >
            Approve Requests
          </button>
        </div>

        <div className="collapse" id="userc">
          <div className="d-flex flex-column">
            <h5>Users</h5>

            <UserList />
          </div>
        </div>
        <div className="collapse" id="showc">
          <h5>Non Public Shows</h5>
          <AdminShowList type={1} />
        </div>
        <div className="collapse" id="showapp">
          <h5>Approved Shows</h5>
          <AdminShowList type={2} />
        </div>
      </div>
    </>
  );
}

export default Admin;
