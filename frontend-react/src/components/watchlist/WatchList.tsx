import IndList from "./IndList";

interface Props {}

function WatchList(props: Props): JSX.Element {
  let indList = {};

  let arr = [];

  for(let i = 0; i < 20; i++) {
    arr.push(i);
  }

  return (
    <>
      <div className="container">
        <div className="d-flex justify-content-between pb-3 pt-3">
          <form action="" className="col-7">
            <div className="input-group">
              <label htmlFor="searchField" className="input-group-text">
                Search
              </label>
              <input className="form-control" placeholder="Type to search..." />
            </div>
          </form>

          <form action="" className="col-4">
            <div className="input-group">
              <label htmlFor="searchField" className="input-group-text">
                User
              </label>
              <input
                className="form-control"
                placeholder="Keep empty for any"
              />
            </div>
          </form>
        </div>

        <div className="list row flex-wrap">
        {
          arr.map((id)=> <IndList id={id} />)
        }
        </div>
      </div>
    </>
  );
}

export default WatchList;
