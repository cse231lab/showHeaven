import { useHistory } from "react-router-dom";
import { Path } from "../../util/constants";
import Footer from "../shared/Footer";

interface Props {}

function Home(props: Props): JSX.Element {

  let history = useHistory();
  history.push(Path.SHOWLIST);

  return (
    <>
    HOme
    </>
  );
}

export default Home;
