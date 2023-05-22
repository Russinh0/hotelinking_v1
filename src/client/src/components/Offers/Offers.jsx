import * as React from 'react';
import Card from '@mui/material/Card';
import CardActions from '@mui/material/CardActions';
import CardContent from '@mui/material/CardContent';
import CardMedia from '@mui/material/CardMedia';
import Button from '@mui/material/Button';
import Typography from '@mui/material/Typography';
import { Box, Container, Skeleton } from '@mui/material';
import axios from 'axios'
export default function Offers() {
  function handlerPromoCode(){
    axios.post('http://localhost:8080/auth/login',{
      "name":"rodrsigsso",
      "password":"Sanstiagsso1",
      "email":"horaciso@gmssail.com"
    }).then((data)=>{console.log(data)})
  }
  return (
    <Container maxWidth="md" sx={{ marginTop:'10vh', display:'flex',alignItems:'center !important','flex-wrap':'wrap',justifyContent:'space-around' }} >
          {!itemData? 
          <Skeleton variant="rectangular" width={210} height={118} />:
          itemData.map((item) => (
          <Card sx={{ maxWidth: '45vw',maxHeight:'45vh',marginBottom:'5vh',paddingBottom:'5vh' }}>
        <CardMedia key={item.img}
        sx={{width: '25vw',height:'25vh'}}
        component="img"
        alt={item.title}
        image={`${item.img}?w=248&fit=crop&auto=format`}
        srcSet={`${item.img}?w=248&fit=crop&auto=format&dpr=2 2x`}
        loading="lazy"
       />
      <CardContent sx={{justifyContent:'center',display:'flex',flexDirection:'column',alignItems:'center',paddingBottom:'3vh'}} >
        <Typography gutterBottom variant="h5" component="div">
        {item.title}
        </Typography>
      <CardActions >
        <Button variant="contained" color="success" size="small" onClick={handlerPromoCode}>Get code</Button>
      </CardActions>
      </CardContent>
    </Card>
      ))}
    </Container>
  );
}

const itemData = [
  {
    img: 'https://images.unsplash.com/photo-1551963831-b3b1ca40c98e',
    title: 'Breakfast',
    author: '@bkristastucchio',
  },
  {
    img: 'https://images.unsplash.com/photo-1551782450-a2132b4ba21d',
    title: 'Burger',
    author: '@rollelflex_graphy726',
  },
  {
    img: 'https://images.unsplash.com/photo-1522770179533-24471fcdba45',
    title: 'Camera',
    author: '@helloimnik',
  },
  {
    img: 'https://images.unsplash.com/photo-1444418776041-9c7e33cc5a9c',
    title: 'Coffee',
    author: '@nolanissac',
  },
  {
    img: 'https://images.unsplash.com/photo-1533827432537-70133748f5c8',
    title: 'Hats',
    author: '@hjrc33',
  },
  {
    img: 'https://images.unsplash.com/photo-1558642452-9d2a7deb7f62',
    title: 'Honey',
    author: '@arwinneil',
  },
  {
    img: 'https://images.unsplash.com/photo-1516802273409-68526ee1bdd6',
    title: 'Basketball',
    author: '@tjdragotta',
  },
  {
    img: 'https://images.unsplash.com/photo-1518756131217-31eb79b20e8f',
    title: 'Fern',
    author: '@katie_wasserman',
  },
  {
    img: 'https://images.unsplash.com/photo-1597645587822-e99fa5d45d25',
    title: 'Mushrooms',
    author: '@silverdalex',
  },
  {
    img: 'https://images.unsplash.com/photo-1567306301408-9b74779a11af',
    title: 'Tomato basil',
    author: '@shelleypauls',
  },
  {
    img: 'https://images.unsplash.com/photo-1471357674240-e1a485acb3e1',
    title: 'Sea star',
    author: '@peterlaster',
  },
  {
    img: 'https://images.unsplash.com/photo-1589118949245-7d38baf380d6',
    title: 'Bike',
    author: '@southside_customs',
  },
];
