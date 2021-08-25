import "./App.css";
import Menu from "./components/shared/Menu";
import Home from "./components/home/Home";
import Profile from "./components/profile/Profile";
import { Route, Switch } from "react-router";
import { Path } from "./util/constants";
import Footer from "./components/shared/Footer";
import WatchList from "./components/watchlist/WatchList";
import ShowList from "./components/showList/ShowList";
import Show from "./components/show/Show";
import Admin from "./components/admin/Admin";
import Forgot from "./components/auth/Forgot";

function App() {
  return (
    <div className="App">
      <Menu />
      <Switch>
        <Route exact path={Path.HOME} component={Home} />
        <Route exact path={Path.PROFILE} component={Profile} />
        <Route exact path={Path.WATCHLIST} component={WatchList} />
        <Route exact path={Path.SHOWLIST} component={ShowList} />
        <Route exact path={Path.SHOW} component={Show} />
        <Route exact path={Path.ADMIN} component={Admin} />
        <Route exact path={Path.FORGOT} component={Forgot} />
      </Switch>
      <Footer />
    </div>
  );
}

export default App;
