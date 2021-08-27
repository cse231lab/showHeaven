interface Props {}

function Show(props: Props): JSX.Element {
  return <>
    

  <div className="d-flex m-auto shadow-lg bg-light border border-2 border-light w-75  rounded m-3 justify-content-around show">
    

    <div className="d-flex flex-column justify-content-start align-items-start me-3 flex-grow-1 ">
      
      <h1 className="">The Witcher</h1>

      <h6>Genre: Drama,Fantasy,Action Fiction, Adventure Fiction, Fantasy Television </h6>

        <div className="accordion d-flex flex-column   align-self-stretch " id="accordionExample">

          <div className="accordion-item  ">

            <h2 className="accordion-header   " id="headingOne">
              <button className="accordion-button bg-dark bg-gradient text-white fs-4  " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Description
              </button>
            </h2>

            <div id="collapseOne" className="accordion-collapse collapse show" aria-labelledby="headingOne" >
              <div className="accordion-body text-start">
                The Witcher is a Polish-American fantasy drama streaming television series created by Lauren Schmidt Hissrich, based on the book series of the same name by Polish writer Andrzej Sapkowski. Set on a fictional, medieval-inspired landmass known as "the Continent", The Witcher explores the legend of Geralt of Rivia and Princess Ciri, who are linked to each other by destiny.[8] It stars Henry Cavill, Freya Allan and Anya Chalotra.
                The first season consisted of eight episodes and was released on Netflix in its entirety on December 20, 2019. It was based on The Last Wish and Sword of Destiny, which are collections of short stories that precede the main Witcher saga. The second season, consisting of eight episodes, is scheduled to be released on December 17, 2021.[9][10]
                Geralt of Rivia, a solitary monster hunter, struggles to find his place in a world where people often prove more wicked than beasts.
              
              </div>
            </div>

          </div>
        
        </div>


         <div className="accordion d-flex flex-column mt-1  align-self-stretch " id="accordionExample">

          <div className="accordion-item  ">

            <h2 className="accordion-header   " id="headingTwo">
              <button className="accordion-button bg-dark bg-gradient text-white fs-4  " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                Seasons
              </button>
            </h2>

            <div id="collapseTwo" className="accordion-collapse collapse show" aria-labelledby="headingTwo" >

              <div className="accordion-body text-start">
                
                    <div className="accordion d-flex flex-column   align-self-stretch " id="accordionExample">

                      <div className="accordion-item  ">

                          <h2 className="accordion-header   " id="seasonOne">
                            <button className="accordion-button bg-light bg-gradient text-dark border border-2 border-dark rounded fs-4  " type="button" data-bs-toggle="collapse" data-bs-target="#collapseseasonOne" aria-expanded="true" aria-controls="collapseseasonOne">
                              Season 1
                            </button>
                          </h2>

                          <div id="collapseseasonOne" className="accordion-collapse collapse show" aria-labelledby="seasonOne" >
                            <div className="accordion-body text-start">               
                            
                              <div className=" h6 d-flex flex-column flex-grow-1">
                                Episode 1: "The End's Beginning"
                              </div>

                               <div className=" h6 d-flex flex-column flex-grow-1 mt-2">
                                Episode 2: "Four Marks"
                              </div>

                              <div className=" h6 d-flex flex-column flex-grow-1 mt-2">
                                Episode 3: "Betrayer Moon"
                              </div>

                               <div className=" h6 d-flex flex-column flex-grow-1 mt-2">
                                Episode 4: "Of Banquets, Bastards and Burials"
                              </div>

                               <div className=" h6 d-flex flex-column flex-grow-1 mt-2">
                                Episode 5: "Bottled Appetites"
                              </div>

                               <div className=" h6 d-flex flex-column flex-grow-1 mt-2">
                                Episode 6: "Rare Species"
                              </div>

                              <div className=" h6 d-flex flex-column flex-grow-1 mt-2">
                                Episode 7: "Before a Fall"
                              </div>

                              <div className=" h6 d-flex flex-column flex-grow-1 mt-2">
                                Episode 8: "Much More"
                              </div>

                            </div>

                          </div>

                      </div>
                  
                    </div>

                    <div className="accordion d-flex flex-column   align-self-stretch " id="accordionExample">

                      <div className="accordion-item  ">

                          <h2 className="accordion-header   " id="seasonTwo">
                            <button className="accordion-button bg-light bg-gradient text-dark border border-2 border-dark rounded fs-4   " type="button" data-bs-toggle="collapse" data-bs-target="#collapseseasonTwo" aria-expanded="true" aria-controls="collapseseasonTwo">
                              Season 2
                            </button>
                          </h2>

                          <div id="collapseseasonTwo" className="accordion-collapse collapse show" aria-labelledby="seasonTwo" >
                            <div className="accordion-body text-start">               
                            
                            </div>
                          </div>

                      </div>
                  
                    </div>
              
              </div>

            </div>

          </div>
      
        </div>



         <div className="accordion d-flex flex-column  mt-1 align-self-stretch " id="accordionExample">

          <div className="accordion-item  ">

            <h2 className="accordion-header   " id="headingThree">
              <button className="accordion-button bg-dark bg-gradient text-white fs-4  " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                Reviews
              </button>
            </h2>

            <div id="collapseThree" className="accordion-collapse collapse show" aria-labelledby="headingThree" >
              <div className="accordion-body text-start">
               
              
              </div>
            </div>

          </div>
      
        </div>

    </div>

    


    <div className="d-flex justify-content-center align-items-center align-self-start border border-4 border-dark rounded shadow-lg">
      
      <img src = {require("../../images/witcher_poster.jpg").default} className="dp"/>

    </div>

    </div>

   

 









  </>;
}

export default Show;
