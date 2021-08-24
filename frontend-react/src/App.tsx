import './App.css';
import Menu from "./components/shared/Menu"
import Home from "./components/home/Home"
import { Route, Switch } from 'react-router';

function App() {
  return (
    <div className="App">
      <Menu />
      <Switch>
          <Route exact path="/" component={Home} />
      </Switch>
    </div>
  );
}

export default App;
