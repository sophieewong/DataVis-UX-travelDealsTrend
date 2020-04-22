type oldDataStructure = [
  {
    id: string;
    deals: string;
    months: string;
    touristCount: string;
  }
];

type newDataStructure = [
  {
    dealDestination: string;
    months: [
      {
        month: string;
        touristCount: string;
      }
    ];
  }
];
