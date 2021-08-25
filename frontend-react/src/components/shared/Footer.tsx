interface Props {}

function Footer(props: Props): JSX.Element {

	
  let arr = [
    {
      name: "adf",
      id: 23423,
      city: "dsafda",
    },
    {
      name: "sfa",
      id: 12321,
      city: "dsfa",
    },
  ];

	let x = 5;

  return (
    <>
      <footer className="bg-dark text-light">
        <div className="container">
					{ x }

					{
						arr.map((elem,index) => {
							return (<></>);
						})
					}

          {arr.map((elem, index) => {
            console.log(elem);
            return (
              <>
                <h2 className="text-light">{elem.name}</h2>
                <h3>
                  {" "}
                  {index} : {elem.id}
                </h3>
              </>
            );
          })}
        </div>
        <h1> Footer </h1>
      </footer>
    </>
  );
}

export default Footer;
