interface Props {}
 
function Profile(props: Props): JSX.Element {
  return (
    <>
    <div className=" p-3 position-relative profilegrid ">

      <div className="clearfix p-3 bg-light col-7 ">
        <div className="d-inline-block float-start clearfix  col-1">First Name:</div>
         <div className="d-inline-block float-start clearfix col-3  ">Sarwar</div>
         <br/>
         <div className="clearfix"></div>
          </div>

        <div className="clearfix p-3  col-7">
        <div className="d-inline-block float-start clearfix col-1  ">Last Name:</div>
         <div className="d-inline-block float-start clearfix col-3  ">Khalid</div>
         <br/>
         <div className="clearfix"></div>
          </div>

         <div className="clearfix p-3 bg-light col-7">
        <div className="d-inline-block float-start clearfix col-1 ">Handle:</div>
         <div className="d-inline-block float-start clearfix col-3">sarwar450</div>
         <br/>
         <div className="clearfix"></div>
          </div>

       <div className="clearfix p-3  col-7">
        <div className="d-inline-block float-start clearfix col-1 ">Email:</div>
         <div className="d-inline-block float-start clearfix col-3 ">sarwar.khalid7@gmail.com</div>
         <br/>
         <div className="clearfix"></div>
          </div>

        <div className="clearfix p-3 bg-light col-7">
        <div className="d-inline-block float-start clearfix col-1 ">Joined at:</div>
         <div className="d-inline-block float-start clearfix col-3 "></div>
         <br/>
         <div className="clearfix"></div>
          </div>

          <div className=" border border-5 border-dark rounded dp">
            <img src = {require("D:/Software/Git repositories/showHeaven/frontend-react/src/geralt.jpg").default}/>
          </div>


          <div className=" position-relative border border-0 mt-5 border-dark">

             <div className="bg-secondary bg-gradient text-white col-3">My List</div>

                <ul className="list-group ">

                  <li className="list-group-item col-3">Show 1</li>
                  <li className="list-group-item col-3">Show 2</li>
                  <li className="list-group-item col-3">Show 3</li>
                  <li className="list-group-item col-3">Show 4</li>
                  <li className="list-group-item col-3">Show 5</li>

                </ul>
                <button type="button" className="btn btn-dark float-start clearfix ms-1 mt-2">Add List</button>

              

         


           <div className="bg-secondary bg-gradient text-white col-3 mt-5">Following</div>

            <div className="col-3 ">
              <ul className="list-group ">
                
                <li className="list-group-item">Show 1</li>
                <li className="list-group-item">Show 2</li>
                <li className="list-group-item">Show 3</li>
                <li className="list-group-item">Show 4</li>
                <li className="list-group-item">Show 5</li>
              
              </ul>
            </div>

           

          </div>


      </div>

     
    
    </>
  );
}
 
export default Profile;