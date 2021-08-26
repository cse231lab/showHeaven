interface Props {}
 
function Profile(props: Props): JSX.Element {
  return (
    <>
    <div className=" d-flex  justify-content-around p-3  profilegrid ">

      <div className="w-50 d-flex flex-column border border-2 border-dark rounded">

        <div className="d-flex  p-3 bg-light  ">
          <div className="  col-2 m-3 ">First Name:</div>
          <div className="    m-3 ">Sarwar</div>
        </div>

        <div className="d-flex  p-3   ">
          <div className="  col-2 m-3 ">Last Name:</div>
          <div className="    m-3 ">Khalid</div>
        </div>


        <div className="d-flex  p-3 bg-light  ">
          <div className="  col-2 m-3 ">Handle:</div>
          <div className="    m-3 ">sarwar450</div>
        </div>


        <div className="d-flex  p-3   ">
          <div className="  col-2 m-3 ">Email:</div>
          <div className="    m-3 ">sarwar@gmail.com</div>
        </div>


        <div className="d-flex  p-3 bg-light  ">
          <div className="  col-2 m-3 ">Joined at:</div>
          <div className="    m-3 ">09-02-2000</div>
        </div>

      </div>

      <div className="m-auto">

        <div className=" border border-5 border-dark rounded dp">
          <img src = {require("../../geralt.jpg").default}/>
        </div>

      </div>

    </div>

  
      

     
    
    </>
  );
}
 
export default Profile;