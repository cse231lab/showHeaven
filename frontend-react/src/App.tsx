import "./App.css";
import Menu from "./components/shared/Menu";
import Home from "./components/home/Home";
import Profile from "./components/profile/Profile"
import { Route, Switch } from "react-router";
import { Path } from "./util/constants";

function App() {
  return (
    <div className="App">
      <Menu />
      <Switch>
        <Route exact path={Path.HOME} component={Home} />
        <Route exact path={Path.PROFILE} component={Profile} />
      </Switch>
    </div>
  );
}

export default App;
